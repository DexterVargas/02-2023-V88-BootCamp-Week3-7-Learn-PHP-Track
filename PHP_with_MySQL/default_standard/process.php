<?php 
session_start();

require_once('db_connection.php');
//post method
if (isset($_POST['action']) && $_POST['action'] =='sign_up') {
   signup_user($_POST);
   //var_dump($_POST);
}elseif (isset($_POST['action']) && $_POST['action'] =='login') {
	login_user($_POST);
}elseif (isset($_POST['action']) && $_POST['action'] =='sign_up_toggle') {
	$_SESSION['toogle'] = !$_SESSION['toogle'];
	header('Location: login.php');
	die();
}elseif (isset($_POST['action']) && $_POST['action'] =='login_toggle') {
	$_SESSION['toogle'] = !$_SESSION['toogle'];
	header('Location: login.php');
	die();
}elseif (isset($_POST['action']) && $_POST['action'] =='review') {
	user_review($_POST);
}elseif (isset($_POST['action']) && $_POST['action'] =='comment') {
	user_review_comment($_POST);
}else{
	session_destroy();
	header('Location: index.php');
	die();
}
//user review
function user_review($post){
		$userid = $_SESSION['userid'];
		$review_context = escape_this_string($post['review_context']);
		if (empty($review_context)) {
			$_SESSION['review-error'] = 'Sorry! You dont have any review. Say something.';
		}
		if (!empty($_SESSION['review-error'])) {
			header('Location: index.php');
			die();
		}else {
		
		$query = "INSERT INTO reviews (user_id, context, created_at, updated_at) VALUES ('{$userid}', '{$review_context}', NOW(), NOW());";
		var_dump($query);
		// //echo $query;
		// //die();
		 run_mysql_query($query);
		// $_SESSION['success_message'] = 'User successfully created!';
		 header('Location: index.php');
		 die();
		}
}
//comment review
function user_review_comment($post){
	$userid = $_SESSION['userid'];
	$reviewid = $post['review_id'];
	$comment_context = escape_this_string($post['comment_context']);
	if (empty($comment_context)) {
		$_SESSION['comment-error'] = 'Sorry! You dont have any review. Say something.';
	}
	if (!empty($_SESSION['comment-error'])) {
		header('Location: index.php');
		die();
	}else {
	
	$query = "INSERT INTO replies (review_id, user_id, content, created_at, updated_at) VALUES ('{$reviewid}','{$userid}', '{$comment_context}', NOW(), NOW());";
	 run_mysql_query($query);
	 $_SESSION['success_message'] = 'User successfully created!';
	 header('Location: index.php');
	 die();
	}
}
//create/register function
function signup_user($post){
    $errors = array();
//firstname
    if (empty($post['firstname'])) {
        $errors[] = "Firstname cannot be blank";
    }elseif (strlen($post['firstname']) < 2) {
        $errors[]= "First name must atleast 2 characters long.";
    }else{
        $search = $post['firstname'];
        for ($isNumeric=0;$isNumeric <strlen($search);$isNumeric++) { 
            if (ctype_digit($search[$isNumeric])) {
                $errors[]= "First name cannot contain numeric characters!";
				break;
            }
        }
    }
//lastname
	if (empty($post['lastname'])) {
		$errors[] = "Lastname cannot be blank";
	}elseif (strlen($post['lastname']) < 2) {
		$errors[]= "Last name must atleast 2 characters long.";
	}else{
		$search2 = $post['lastname'];
		for ($isNumeric=0;$isNumeric <strlen($search2);$isNumeric++) { 
			if (ctype_digit($search2[$isNumeric])) {
				$errors[]= "Last name cannot contain numeric characters!";
				break;
			}
		}
	}
//email
	if (empty($post['email'])) {
		$errors[] = "email cannot be blank";
	}elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "email not valid";
	}
//password
	if (empty($post['password']) || empty($post['confirm_password'] )) {
		$errors[]= "Password cannot be empty.";
	}
	if (strlen($post['password']) < 8) {
		$errors[]= "Password must be at least 8 characters long.";
	}
	if ($post['password'] !== $post['confirm_password']) {
		$errors[]= "Password not match. Check again.";
	}
//this will return the post values into input boxes
	$_SESSION['firstname'] = $post['firstname'];
	$_SESSION['lastname'] = $post['lastname'];
	$_SESSION['email'] = $post['email'];
	$_SESSION['password'] = $post['password'];
	$_SESSION['confirm_password'] = $post['confirm_password'];

//------------------validation end----------------------
	$_SESSION['sign_up_errors'] = $errors;

	if (count($errors) >0 ) {
		// var_dump($_SESSION);
		header('Location: login.php');
		die();
	}else {
		$password = escape_this_string($post['password']);
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encrypted_password = md5($password . '' . $salt);
		$query = "INSERT INTO users (first_name, last_name, email, password,salt,  created_at, updated_at) VALUES ('{$post['firstname']}', '{$post['lastname']}', '{$post['email']}', '{$encrypted_password}', '{$salt}', NOW(), NOW());";
		//echo $query;
		//die();
		run_mysql_query($query);
		$_SESSION['success_message'] = 'User successfully created!';
		header('Location: login.php');
		die();
	}
}
//LOGIN function
function login_user($post){
	$errors = array();
	if (empty($post['email'])) {
		$errors[] ='Mobile number cannot be blank. Please enter mobile number.';
	}else {
		$password = $post['password'];
		$phone_query = "SELECT * FROM users where users.email = '{$post['email']}' ;";
		$check = fetch_record($phone_query);
		if (!empty($check)) {
			$encrypted_password = md5($password.''.$check['salt']);
			if ($check['password']==$encrypted_password) {
				//$errors[] = 'success';
				$_SESSION['userid'] = $check['id'];
				$_SESSION['username'] = $check['first_name'].' '.$check['last_name'];
				$$_SESSION['logged_in'] = TRUE;
				header('Location: index.php');
			}
			else{
				$errors[] = 'Invalid password.';
				$_SESSION['login_email'] = $post['email'];
			}
		}else {
			$errors[] = 'Email address does not exist. Use another number.';
		}
	}
	$_SESSION['errors'] = $errors;
	if (count($errors) >0 ) {
		// var_dump($_SESSION);
		header('Location: login.php');
		die();
	}
}
?>
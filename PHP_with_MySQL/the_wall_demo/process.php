<?php 
session_start();

require_once('db_connection.php');
//post method

if (isset($_POST['action']) && $_POST['action'] =='sign_up') {
   	signup_user($_POST);
}elseif (isset($_POST['action']) && $_POST['action'] =='login') {
	login_user($_POST);
}elseif (isset($_POST['action']) && $_POST['action'] =='comment') {
	var_dump($_POST);
	if (!empty($_POST['comment'])) {
		$comment_content = escape_this_string($_POST['comment']);
		$query = "INSERT INTO comments(user_id, content, created_at, updated_at) VALUES ('{$_SESSION['userid']}', '{$comment_content}', NOW(), NOW());";
		//fetch_all($query);
		//header('Location: index.php');
		die();
	}else {
		//$_SESSION['comment-error'] = 'Comment can not be blank. Atleast type something';
		//header('Location: index.php');
		die();
	}
}elseif (isset($_POST['action']) && $_POST['action'] =='reply') {
	var_dump($_POST);
	if (!empty($_POST['reply'])&& !empty($_POST['comment_id'])) {
		$reply_content = escape_this_string($_POST['reply']);
		//echo $reply_content;
		$query = "INSERT INTO replies(user_id, comment_id, content, created_at, updated_at) VALUES ('{$_SESSION['userid']}', '{$_POST['comment_id']}', '{$reply_content}', NOW(), NOW());";
		fetch_all($query);
		header('Location: index.php');
		die();
	}else {
		//echo 'errorasdasasdasdasdsadd';
		$_SESSION['reply-error-id'] = $_POST['comment_id'];
		$_SESSION['reply-error'] = 'Reply can not be blank. Atleast type something';
		header('Location: index.php');
		die();
	}
}else{
	session_destroy();
	header('Location: index.php');
	die();
}
//user review

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
		$errors[] ='email cannot be blank.';
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
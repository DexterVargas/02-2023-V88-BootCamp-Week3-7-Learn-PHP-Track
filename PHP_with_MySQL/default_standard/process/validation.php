<?php 

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
// phone number
		$number = $post['phone_number'];
	if (empty($post['phone_number'])) {
		$errors[] ='Mobile number cannot be blank. Please enter mobile number.';
	}else{
		$phone_query = "SELECT * FROM users where users.contact_number = '{$post['phone_number']}';";
		$check = fetch_record($phone_query);
		if (!empty($check)) {
			$errors[] = 'Mobile number already used/exist. Use another number.';
			var_dump($check);
		}
	}
	if (!ctype_digit($number)) {
		$errors[] = '^Invalid mobile number. Must not contain character other than Numeric. Please check again.';
	}
	if (substr($number,0, 2)!='09') {
		$errors[] ='^Invalid mobile number. Check mobile preffix.';
	}
	if (strlen($number) <> 11) {
		$errors[] = '^Invalid mobile number. must be 11 digits.';
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
	$_SESSION['phone_number'] = $post['phone_number'];
	$_SESSION['password'] = $post['password'];
	$_SESSION['confirm_password'] = $post['confirm_password'];

//------------------validation end----------------------
	$_SESSION['errors'] = $errors;

	if (count($errors) >0 ) {
		// var_dump($_SESSION);
		header('Location: index.php');
		die();
	}else {
		$password = escape_this_string($post['password']);
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$encrypted_password = md5($password . '' . $salt);
		$query = "INSERT INTO users (first_name, last_name, contact_number, password,salt,  created_at, updated_at) VALUES ('{$post['firstname']}', '{$post['lastname']}', '{$post['phone_number']}', '{$encrypted_password}', '{$salt}', NOW(), NOW());";
		//echo $query;
		//die();
		run_mysql_query($query);
		$_SESSION['success_message'] = 'User successfully created!';
		header('Location: index.php');
		die();
	}
}
//LOGIN function
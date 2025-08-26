<?php 
session_start();
require_once('db_connection.php');

if(isset($_POST['mobile']) && $_POST['mobile']=='mobile'){
    $_SESSION['number'] = $_POST['number'];
    //$_SESSION['invalid'] = '^Invalid mobile number. Please check again.';
    //validate number
    $errors = array ();
    if (empty($_POST['number'])) {
        $_SESSION['invalid'] = '^Field cannot be blank. Please enter number.';
        $errors[] = $_SESSION['invalid'];
    }else {
        $searcnumber = $_POST['number'];
	    for ($isNumeric=0;$isNumeric <strlen($searcnumber);$isNumeric++) { 
		if (ctype_digit($searcnumber[$isNumeric])) {
			if (strlen($searcnumber) != 11) {
                $_SESSION['invalid'] = '^Invalid mobile number. must be 11 digits.';
                $errors[] = $_SESSION['invalid'];
            }elseif (substr($searcnumber,0, 2)!='09') {
                $_SESSION['invalid'] = '^Invalid mobile number. Check mobile preffix.';
                $errors[] = $_SESSION['invalid'];
            }
		}else {
            $_SESSION['invalid'] = '^Invalid mobile number. Must not contain character other than Numeric. Please check again.';
            $errors[] = $_SESSION['invalid'];
        }
	}
    }
    if (count($errors)>0) {
        header('Location: index.php');  
    }else {
        //add to database
        $query = "INSERT INTO numbers (mobile_number, created_at, updated_at) VALUES('{$_POST['number']}', NOW(), NOW())";
        if(run_mysql_query($query)) {
			$_SESSION['message'] = "New lesson has been added!";
			} else {
			$_SESSION['message'] = "Failed to add new lesson "; 
			}
		unset($_POST['mobile']);
        //note when success add
        $_SESSION['success'] = 'Success! Contact number ' . $_POST['number'] . ' is now added.';
        //go to success.php
        header('Location: success.php');
    }
}
if(isset($_GET['numberid'])){
	$num = $_GET['mobilenumber'];
	$query = "DELETE FROM numbers WHERE (id = '{$_GET['numberid']}');";
        if(run_mysql_query($query)) {
			$_SESSION['message'] = "deleted";
			} else {
			$_SESSION['message'] = "Failed to delete"; 
			}
	$_SESSION['success'] = 'Record deleted successfully! Deleted number: ' .$num. '.';
	header('Location: success.php');
}
if(isset($_GET['home'])){
	session_destroy();
	header('Location: index.php');
}
?>
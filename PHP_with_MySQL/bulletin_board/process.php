<?php 
session_start();
session_destroy();
session_start();
require_once('db_connection.php');
//$errors = array ();
if(isset($_POST['bulletin']) && $_POST['bulletin']=='bulletin'){
    $_SESSION['subjects'] = $_POST['subjects'];
    $_SESSION['details'] = $_POST['details'];
    //$_SESSION['invalid'] = '^Invalid mobile number. Please check again.';
    //validate number
    $errors = array ();
    if (empty($_POST['subjects'])) {
        $_SESSION['invalid_subjects'] = '^Field cadgfnnot be blank. Please enter subject name.';
        $errors[] = $_SESSION['invalid_subjects'];
    }
    if (empty($_POST['details'])) {
        $_SESSION['invalid_details'] = '^Field cannot be blank. Please enter subject details.';
        $errors[] = $_SESSION['invalid_details'];
    }
    if (count($errors)>0) {
        $_SESSION['errors'] = $errors;
        //var_dump($_SESSION['errors']);
        header('Location: index.php');  
    }else {
        //add to database
        $query = "INSERT INTO bulletin (subjects, details, created_at, updated_at) VALUES('{$_POST['subjects']}', '{$_POST['details']}', NOW(), NOW())";
        if(run_mysql_query($query)) {
			$_SESSION['success'] = 'Success! New bulletin added. Subject name: ' . $_POST['subjects'];
			} else {
            $_SESSION['success'] = 'Failed!'; 
			}
        //go to index.php
		unset($_SESSION['invalid_subjects']);
        unset($_SESSION['invalid_details']);
        unset($_SESSION['subjects']);
        unset($_SESSION['details']);
        header('Location: index.php');
    }
    //var_dump($errors);
}
//delete bulletin
if(isset($_GET['bulletinid'])){
	$sub = $_GET['bulletinsubject'];
	$query = "DELETE FROM bulletin WHERE (id = '{$_GET['bulletinid']}');";
        if(run_mysql_query($query)) {
		} else {
		}
        $_SESSION['delete'] = 'Record deleted successfully! Deleted subject: ' .$sub. '.';
	header('Location: main.php');
}
if(isset($_GET['home'])){
	session_destroy();
	header('Location: index.php');
}
?>
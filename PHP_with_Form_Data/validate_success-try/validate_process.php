<?php 
session_start();
if (isset($_POST['action']) && $_POST['action']=='login') {
    //empty array to collection errors
    $errors = array();
    //email validation
    if (empty($_POST['email'])) {
        $errors[] = "email cannot be blank";
    }
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email not valid";
    }
    //password validation
    if (empty($_POST['password'])) {
        $errors[] = "password cannot be blank";
    }
    if (count($errors)>0) {
        ////if there are errors, assign the session variable!
        $_SESSION['errors'] = $errors;
        header('Location: validate.php');
    }
    else {
        $_SESSION['success'] = "Welcome!";
        header('Location: validate_home.php');

    }
}
?>
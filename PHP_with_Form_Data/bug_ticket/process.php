<?php 
session_start();
if (isset($_POST['report']) && $_POST['report']=='report') {
$errors = array();
//date
$mydateTimeZone = new DateTime("now", new DateTimeZone('Asia/Singapore') );
$current_date = $mydateTimeZone->format('Y-m-d');
if (empty($_POST['date'])){
	$errors[] = "Invalid Date. Check again";
}elseif ($_POST['date']< $current_date){
	$errors[] = "You cannot pick days before today.";
}
//firstname
if (empty($_POST['fname'])) {
	$errors[] = "Firstname cannot be blank";
}else{
	$search = $_POST['fname'];
	for ($isNumeric=0;$isNumeric <strlen($search);$isNumeric++) { 
		if (ctype_digit($search[$isNumeric])) {
			$errors[]= "firstname cannot contain numeric characters!";
		}
	}
}
//lastname
if (empty($_POST['lname'])) {
	$errors[] = "Lastname cannot be blank";
}else{
	$search2 = $_POST['fname'];
	for ($isNumeric=0;$isNumeric <strlen($search2);$isNumeric++) { 
		if (ctype_digit($search[$isNumeric])) {
			$errors[]= "lastname cannot contain numeric characters!";
		}
	}
}
//email
if (empty($_POST['email'])) {
	$errors[] = "email cannot be blank";
}elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$errors[] = "email not valid";
}
//title
if (empty($_POST['issue_title'])) {
	$errors[] = "Issue Title cannot be blank";
}elseif (strlen($_POST['issue_title'])>50){
	$errors[] = "Issue Title must not exceed 50 characters.";
}
//details
if (empty($_POST['issue_details'])||strlen($_POST['issue_details'])>250) {
	$errors[] = "Issue Details cannot be blank";
}
$_SESSION['date'] = $_POST['date'];
$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['issue_title'] = $_POST['issue_title'];
$_SESSION['issue_details'] = $_POST['issue_details'];
////if there are errors, assign the session variable!
$_SESSION['errors'] = $errors;

if (count($errors)>0) {
    header('Location: index.php');  
}else {
  	header('Location: home.php');
}
}
?>
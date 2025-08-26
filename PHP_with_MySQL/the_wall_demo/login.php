<?php 
session_start();
if (!isset($_SESSION['toogle'])) {
	$_SESSION['toogle'] = TRUE;
}
function unsetting(){
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	//unset($_SESSION['contact']);
	unset($_SESSION['password']);
	unset($_SESSION['confirm_password']);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style-login.css">
		<title>Login presets</title>
	</head>
	<body>
		<div class="main-container">
			<div class="container">
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="login">
					<input type="text" name="email" placeholder="Enter email address" value="deckster@fake.com">
					<input type="password" name="password" placeholder="Password" value="12345678">
					<input type="submit" value="Login »" class="btn btn-main">
<?php				if (isset($_SESSION['errors'])) {
						foreach ($_SESSION['errors'] as $key => $error) {
?>					<p class="error"><?= $error;?></p>
<?php						}
					}unset($_SESSION['errors']);	unset($_SESSION['login_email']);				
?>				</form>
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="sign_up_toggle">
					<input type="submit" value="Create new account »" class="btn btn-toggle">
				</form>
			</div>
			<div class="container">
				<h1 class="login-labels">Create new user</h1>
				<p class="login-labels">It's quick and easy. complete all the fields</p>
<?php			if (isset($_SESSION['success_message'])) {
?>				<p class="success"><?= $_SESSION['success_message'];?></p>					
<?php				unsetting();
}
?>				<form action="process.php" method="post">
					<input type="hidden" name="action" value="sign_up">
					<input type="text" name="firstname" placeholder="First name" class="user-name" value="<?= (!isset($_SESSION['firstname']))? null: $_SESSION['firstname']; ?>"><!-- 
				 --><input type="text" name="lastname" placeholder="Last name" class="user-name" value="<?= (!isset($_SESSION['lastname']))? null: $_SESSION['lastname']; ?>">
					<input type="text" name="email" placeholder="Email address" value="<?= (!isset($_SESSION['email']))? null: $_SESSION['email']; ?>">
					<input type="text" name="contact" placeholder="Mobile number" value="<?= (!isset($_SESSION['contact']))? null: $_SESSION['contact']; ?>">
					<input type="password" name="password" placeholder="New Password" value="<?= (!isset($_SESSION['password']))? null: $_SESSION['password']; ?>">
					<input type="password" name="confirm_password" placeholder="Confirm new password" value="<?= (!isset($_SESSION['confirm_password']))? null: $_SESSION['confirm_password']; ?>">
					<input type="submit" value="Sign Up »" class="btn btn-main">
				</form>
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="login_toggle">
					<input type="submit" value="Login »" class="btn btn-toggle">
				</form>
<?php 				if (isset($_SESSION['sign_up_errors'])) {
						foreach ($_SESSION['sign_up_errors'] as $key => $error) {
?>					<p class="error"><?= $error;?></p>
<?php						}
					}
					unset($_SESSION['sign_up_errors']);
					unset($_SESSION['success_message']);
					unsetting();
					//var_dump( ctype_digit("09123hjk45679"));

?>			</div>
		</div>
	</body>
</html>
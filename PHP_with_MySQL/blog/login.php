<?php 
session_start();
if (!isset($_SESSION['toogle'])) {
	$_SESSION['toogle'] = TRUE;
}
function unsetting(){
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	unset($_SESSION['password']);
	unset($_SESSION['confirm_password']);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Login | The Blog Page</title>
	</head>
	<body>
		<div class="main-container">
<?php if ($_SESSION['toogle']) {
?>			<div class="login-container container">
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="login">
					<input type="text" name="email" placeholder="Enter email address" value="<?= (!isset($_SESSION['login_email']))? null: $_SESSION['login_email']; ?>">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" value="Login" class="login">
<?php				if (isset($_SESSION['errors'])) {
						foreach ($_SESSION['errors'] as $key => $error) {
?>					<p class="error"><?= $error;?></p>
<?php						}
					}unset($_SESSION['errors']);	unset($_SESSION['login_email']);				
?>				</form>
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="sign_up_toggle">
					<input type="submit" value="Create new account" class="create">
				</form>
			</div>
<?php 
}else{
?>			<div class="signup-container container">
				<h1>Sign Up</h1>
				<p>It's quick and easy.</p>
<?php			if (isset($_SESSION['success_message'])) {
?>				<p class="success"><?= $_SESSION['success_message'];?></p>					
<?php				unsetting();
}
?>				<form action="process.php" method="post">
					<input type="hidden" name="action" value="sign_up">
					<input type="text" name="firstname" placeholder="First name" class="user-name" value="<?= (!isset($_SESSION['firstname']))? null: $_SESSION['firstname']; ?>"><!-- 
				 --><input type="text" name="lastname" placeholder="Last name" class="user-name" value="<?= (!isset($_SESSION['lastname']))? null: $_SESSION['lastname']; ?>">
					<input type="text" name="email" placeholder="Email address" value="<?= (!isset($_SESSION['email']))? null: $_SESSION['email']; ?>">
					<input type="password" name="password" placeholder="New Password" value="<?= (!isset($_SESSION['password']))? null: $_SESSION['password']; ?>">
					<input type="password" name="confirm_password" placeholder="Confirm new password" value="<?= (!isset($_SESSION['confirm_password']))? null: $_SESSION['confirm_password']; ?>">
					<input type="submit" value="Sign Up" class="create">
				</form>
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="login_toggle">
					<input type="submit" value="Login" class="btn-link">
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
}
?>			</div>
		</div>
	</body>
</html>
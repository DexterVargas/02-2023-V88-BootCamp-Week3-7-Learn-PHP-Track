<?php 
session_start();
if (!isset($_SESSION['toogle'])) {
	$_SESSION['toogle'] = 'login';
}
function unsetting(){
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['phone_number']);
	unset($_SESSION['password']);
	unset($_SESSION['confirm_password']);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Authentication I</title>
	</head>
	<body>
		<div class="main-container">
<?php if ($_SESSION['toogle'] == 'login') {
?>			<div class="toggle">
				<div class="login-container-pair">
					<h1 class="app-title">fesbol</h1>
					<h2>Connect with barkada and kapitbahays on Facebook. Tumuhod ka na.</h2>
					<h2>fishbol = 8pcs/&#8369;5.00, kikiam = 4pcs/&#8369;5.00, tokneneng/siomai = 4pcs/&#8369;20.00. No Credit!</h2>
				</div>
				<div class="login-container container">
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="login">
						<input type="text" name="contact_number" placeholder="Mobile number" value="<?= (!isset($_SESSION['login_phone_number']))? null: $_SESSION['login_phone_number']; ?>">
						<input type="password" name="password" placeholder="Password">
						<input type="submit" value="Login" class="login">
<?php					if (isset($_SESSION['errors'])) {
						foreach ($_SESSION['errors'] as $key => $error) {
?>						<p class="error"><?= $error;?></p>
<?php						}
					}unset($_SESSION['errors']);	unset($_SESSION['login_phone_number']);				
?>					</form>
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="change_password_toggle">
						<input type="submit" value="Forgot password?" class="forgot btn-link">
					</form>
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="sign_up_toggle">
						<input type="submit" value="Create new account" class="create">
					</form>
				</div>
			</div>
<?php 
}elseif ($_SESSION['toogle'] == 'create') {
?>
			<div class="toggle">
				<div class="signup-container container">
					<h1>Sign Up</h1>
					<p>It's quick and easy.</p>
<?php			if (isset($_SESSION['success_message'])) {
?>					<p class="success"><?= $_SESSION['success_message'];?></p>					
<?php				unsetting();
}
?>					<form action="process.php" method="post">
						<input type="hidden" name="action" value="sign_up">
						<input type="text" name="firstname" placeholder="First name" class="user-name" value="<?= (!isset($_SESSION['firstname']))? null: $_SESSION['firstname']; ?>"><!-- 
				 	 --><input type="text" name="lastname" placeholder="Last name" class="user-name" value="<?= (!isset($_SESSION['lastname']))? null: $_SESSION['lastname']; ?>">
						<input type="text" name="phone_number" placeholder="Mobile number" value="<?= (!isset($_SESSION['phone_number']))? null: $_SESSION['phone_number']; ?>">
						<input type="password" name="password" placeholder="New Password" value="<?= (!isset($_SESSION['password']))? null: $_SESSION['password']; ?>">
						<input type="password" name="confirm_password" placeholder="Confirm new password" value="<?= (!isset($_SESSION['confirm_password']))? null: $_SESSION['confirm_password']; ?>">
						<input type="submit" value="Sign Up" class="create">
					</form>
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="login_toggle">
						<input type="submit" value="Login" class="btn-link">
					</form>
<?php 				if (isset($_SESSION['errors'])) {
						foreach ($_SESSION['errors'] as $key => $error) {
?>							<p class="error"><?= $error;?></p>
<?php						}
					}
					unset($_SESSION['errors']);
					unset($_SESSION['success_message']);
					unsetting();
					//var_dump( ctype_digit("09123hjk45679"));
?>				</div>
				<div class="login-container-pair">
					<h1>Creating new account</h1>
					<h2>Sign up for Fesbol and find your TRUEPA. Create an account to start sharing foods and hingi with barakada sa kanto. It's easy to register.</h2>
					<h2>Siomai Rice, Pares, Mami, Goto comming soon....</h2>
				</div>
			</div>
<?php 
}elseif ($_SESSION['toogle'] == 'modify') {
?>			<div class="toggle">
				<div class="login-container-pair">
					<h1>Resetting password.</h1>
					<h2>Dont want to share you foodies. Change password so your kapitbahay can't hingi your fesbol.</h2>
					<h2>Mahal bilihin, wag magshare.</h2>
					<p>Knock knock!! whos der? village88. v88 who? password is me.</p>
				</div>
				<div class="login-container container">
					<h2>Reset to default password</h2>
					<p>Wag ishare sa kapitbahay</p>
<?php			if (isset($_SESSION['change_success_message'])) {
?>					<p class="success"><?= $_SESSION['change_success_message'];?></p>					
<?php				unsetting();
}
?>					<form action="process.php" method="post">
						<input type="hidden" name="action" value="change_password">
						<input type="text" name="contact_number" placeholder="Mobile number" value="<?= (!isset($_SESSION['phone_number']))? null: $_SESSION['phone_number']; ?>">
						<input type="submit" value="Reset Password" class="login">
<?php				if (isset($_SESSION['change-errors'])) {
						foreach ($_SESSION['change-errors'] as $key => $error) {
?>						<p class="error"><?= $error;?></p>
<?php					}}unset($_SESSION['change-errors']);unset($_SESSION['change_success_message']);?>					</form>
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="login_toggle">
						<input type="submit" value="Cancel? | Login instead" class="btn-link">
					</form>
				</div>
			</div>
<?php
}	
?>		</div>
	</body>
</html>
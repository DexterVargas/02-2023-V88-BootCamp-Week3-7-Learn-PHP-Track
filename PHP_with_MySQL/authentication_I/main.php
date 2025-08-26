<?php 

session_start();

//echo "WELCOME ! {$_SESSION['username']}";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Main Fesbol</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<a href="process.php">Logout</a>	
	<h1 class="app-title">fesbol</h1>
	<h2>Connect with barkada and kapitbahays on Facebook. Tumuhod ka na.</h2>
	<h2>fishbol = 8pcs/&#8369;5.00, kikiam = 4pcs/&#8369;5.00, tokneneng/siomai = 4pcs/&#8369;20.00. No Credit!</h2>
	<h1 class="app-title">WELCOME suki</h1>
	<h1 class="user-title"><?= $_SESSION['username']; ?></h1>
	<h1>Creating new account</h1>
	<h2>Sign up for Fesbol and find your TRUEPA. Create an account to start sharing foods and hingi with barakada sa kanto. It's easy to register.</h2>
	<h2>Siomai Rice, Pares, Mami, Goto comming soon....</h2>
	<h1>Resetting password.</h1>
	<h2>Dont want to share you foodies. Change password so your kapitbahay can't hingi your fesbol.</h2>
	<h2>Mahal bilihin, wag magshare.</h2>
	<p>Knock knock!! whos der? village88. v88 who? password is me.</p>
	</body>
</html>
<?php 
session_start();
//$_session = array ();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Raffle Entry</title>
	</head>
	<body>
		<div class="main-container">
			<img src="img/logo.jpg" alt="logo image"><!-- 
		 --><h1> Mang Knorrs-Spend and Win Raffle Promo</h1>
			<h2>Fill up and get the chance to win 100% discount coupons to all our Hotel and Resto Bars Nationwide!!</h2>
			<h3>Join Now!!</h3>
			<form action="process.php" method="post">
				<label for="number">Enter Mobile Number</label>
				<input type="text" name="number" id="number" value="<?= (!isset($_SESSION['number']))? null: $_SESSION['number']; ?>"> <span name="invalid"> <?= (!isset($_SESSION['invalid']))? null: $_SESSION['invalid']; ?></span>
				<input type="hidden" name="mobile" value="mobile">
				<input type="submit" value="Join Promo" class="btn">
			</form>
		</div>
	</body>
</html>
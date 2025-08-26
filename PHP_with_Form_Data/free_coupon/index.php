<?php 
session_start();
if (!isset($_SESSION['count_coupon'])) {
	$_SESSION['count_coupon'] = 10;
	$_SESSION['toggle_form'] = true;
	$_SESSION['customer'] = 'Customer';
}
if (isset($_POST['submit'])&& $_POST['submit'] == 'Submit') {
	$_SESSION['toggle_form'] = !$_SESSION['toggle_form'];
    if (!isset($_SESSION['count_coupon'])) {
        $_SESSION['count_coupon'] = 10;
    }else {
        $_SESSION['count_coupon'] -= 1;
    }
    $_SESSION['customer'] = $_POST['name'];
}
if (isset($_POST['claim'])&& $_POST['claim'] == 'Claim_again') {
	$_SESSION['toggle_form'] = !$_SESSION['toggle_form'];
}
if (isset($_POST['reset'])&& $_POST['reset'] == 'Reset_count') {
	session_destroy();
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Free Coupons</title>
	</head>
	<body>
		<h1>Welcome <?= $_SESSION['customer']; ?></h1>
		<p>We're giving away <span>free coupons</span></p>
		<p>as a token of appreciation</p> 
<?php	if ($_SESSION['toggle_form']) {
?>		<p><?= ($_SESSION['count_coupon'] <= 0)? '':'for first ' . $_SESSION['count_coupon']. ' customer(s)'; ?></p>
		<form action="index.php" method="POST">
			<label for="name">Kindly type your name:</label>
			<input type="text" name="name" id="name" required class="customer-name">
			<input class = "btn-submit" type="submit" name="submit" value="Submit">
		</form>
<?php	} else{
?>	  <form class="form-coupon" action="index.php" method="POST">
			<label class="discount"><?= ($_SESSION['count_coupon'] < 0)? 'Sorry!':'50% Discount'; ?></label>
			<label class="ticket-number"><?= ($_SESSION['count_coupon'] < 0)? 'Unavailable': rand(1000000,9999999); ?></label>
			<input class ="btn-reset" type="submit" name ="reset" value="Reset_count"></a>
			<input class = "btn-claim" type="submit" name="claim" value="Claim_again"></a>
		</form>
<?php	}
?>  	</body>
</html>
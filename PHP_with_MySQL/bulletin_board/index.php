<?php 
session_start();
//$_session = array ();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Bulletin Board Entry</title>
	</head>
	<body>
		<div class="main-container">
			<h1> Bulletin Board Entry</h1>
			<form action="process.php" method="post">
				<label for="subject">Subject: </label>
				<input type="text" name="subjects" id="subject" value="<?= (!isset($_SESSION['subjects']))? null: $_SESSION['subjects']; ?>"> 
				<p><span> <?= (!isset($_SESSION['invalid_subjects']))? null: $_SESSION['invalid_subjects']; ?></span></p>
				<label for="details">Details: </label><!-- 
			 --><textarea name="details" id="details" class="details"><?= (!isset($_SESSION['details']))? null: $_SESSION['details']; ?></textarea>
				<p><span> <?= (!isset($_SESSION['invalid_details']))? null: $_SESSION['invalid_details']; ?></span></p>
				<input type="hidden" name="bulletin" value="bulletin">
				<p>
					<input type="submit" value="&#43;Add" class="btn">
					<a class="btn" href="main.php">Skip&#10097;</a>
				</p>
			</form>
			<p><?= (!isset($_SESSION['success']))? null: $_SESSION['success']; ?></p>
		</div>
	</body>
</html>
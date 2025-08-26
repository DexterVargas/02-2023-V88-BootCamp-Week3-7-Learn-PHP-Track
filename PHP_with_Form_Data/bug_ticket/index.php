<?php 
session_start();
//$_SESSION = array();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Bug Ticket</title>
	</head>
	<body>
		<div class="main-container">
			<h1>XXX.hub Code Bug Report</h1>
			<p>bug tracking, issue management bug report </p>
<?php

       		if (isset($_SESSION['errors'])) {
				foreach ($_SESSION['errors'] as $error) {
			?>      
					<p class="error"><?= $error?></p>
			<?php 
				}
			}
?>
			<form action="process.php" method="post">
				<div class="labels">
					<label for="date">DATE:*</label>
					<label for="fname">Firstname:*</label>
					<label for="lname">Lastname:*</label>
					<label for="email">Email:*</label>
					<label for="issue_title">Issue Title:*</label>
					<label for="issue_details">Issue Details:*</label>
					<label for="screenshot">Upload screenshot (optional)</label>
				</div><!-- 
			 --><div class="inputs">
					<input type="date" name="date" id="date" value="<?= (!isset($_SESSION['date']))? null: $_SESSION['date']; ?>">
					<input type="text" name="fname" id="fname" value="<?= (!isset($_SESSION['fname']))? null: $_SESSION['fname']; ?>">
					<input type="text" name="lname" id="lname" value="<?= (!isset($_SESSION['lname']))? null: $_SESSION['lname']; ?>">
					<input type="text" name="email" id="email" value="<?= (!isset($_SESSION['email']))? null: $_SESSION['email']; ?>">
					<input type="text" name="issue_title" id="issue_title" value="<?= (!isset($_SESSION['issue_title']))? null: $_SESSION['issue_title']; ?>">
					<input type="text" name="issue_details" id="issue_details" value="<?= (!isset($_SESSION['issue_details']))? null: $_SESSION['issue_details']; ?>">
					<input type="file" name="screenshot" id="screenshot">
					<input type="hidden" name="report" value="report">
					<input type="submit" value="Submit" class="submit">
				</div>
			</form>
		</div>
	</body>
</html>
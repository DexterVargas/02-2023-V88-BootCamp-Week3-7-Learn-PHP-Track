<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Feedback Form - Result</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form>
			<h1>Submitted Entry</h1>
			<label>Your name (optional):</label> <span><?= (!$_POST["name"])? 'Anonymous': $_POST["name"]?></span>
			<p></p>
			<label> Course Title:</label><span><?= $_POST["course"]?></span>
			<p></p>
			<label>Give Score(1-10):</label><span><?= $_POST["score"]?>pts</span>
			<p></p>
			<label>Reason:</label>
			<p><?= (!$_POST["reason"])? '--no reason--': $_POST["name"]?></p>
			<a href="index.php"><input type="button" value="Return"></a>
		</form>
	</body>
</html>
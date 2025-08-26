<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Feedback Form - Fill up</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form action="result.php" method="post">
			<h1>Feedback Form</h1>
			<label for="name">Your name (optional):</label>
			<p></p>
			<input type="text" name="name" id="name" placeholder="Enter name">
			<p></p>
			<label for="course"> Course Title:</label>
			<p></p>
			<select name="course" id="course">
				<option value="PHP_Track">PHP Track</option>
				<option value="JavaScript_Track">JavaScript Track</option>
				<option value="Backend_Track">Backend Track</option>
				<option value="Dump_Track">Dump Track</option>
			</select>
			<p></p>
			<label for="score">Give Score(1-10):</label>
			<p></p>
			<select name="score" id="course">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10" selected>10</option>
			</select>
			<p></p>
			<label for="reason">Reason:</label>
			<p></p>
			<textarea name="reason" id="reason" cols="42" rows="5" placeholder="Share your reason why give us that score.. Type Here.."></textarea>
			<p></p>
			<input type="submit" value="Submit" class="btn_submit">
		</form>
	</body>
</html>
<?php
session_start();
// index.php
// include connection page
require_once('db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Success Page</title>
	</head>
	<body>
		<div class="success-container">
			<img src="img/logo.jpg" alt="logo image"><!-- 
		 --><h1> Mang Knorrs-Spend and Win Raffle Promo</h1>
			<h2>Thank you for registering.</h2>
			<h3>Raffle date: February 14, 2023</h3>
			<p><?= (!isset($_SESSION['success']))? null: $_SESSION['success']; ?></p>
			<a class="home" href="process.php?home=home">&#171;Home</a>
			<table>
				<tr>
					<th>Contact number</th>
					<th>Date inserted</th>
				</tr>
<?php   $table_query = "SELECT id, mobile_number as Mobile_Number, created_at as Date_Registered FROM numbers order by id;";
        $table_result = fetch_all($table_query);
        //var_dump($table_result);
        foreach($table_result as$key => $value)
        {
			$date = date_create($value['Date_Registered']);
			if ($key%2===0) {
?>				<tr class="colored">
<?php 
			} else{
?>				<tr>	
<?php		}
?>					<td><?= $value['Mobile_Number'] ?></td>
					<td><?= date_format($date,'m-d-Y h:iA') ?></td>
					<td><a class = "modify" href="process.php?numberid=<?= $value["id"]; ?>&mobilenumber=<?= $value["Mobile_Number"]; ?>">Delete</a></td>
				</tr>
<?php  }
?>			</table>
		</div>
	</body>
</html>

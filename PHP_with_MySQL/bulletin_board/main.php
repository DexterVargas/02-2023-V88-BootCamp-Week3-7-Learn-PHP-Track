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
		<title>Bulletin Board</title>
	</head>
	<body>
		<div class="bulletin-container">
			<h1> Bulletin Board View</h1>
			<p class="delete"><?= (!isset($_SESSION['delete']))? null: $_SESSION['delete']; ?></p>
			<a class="home" href="process.php?home=home">&#43;Add Bulletin</a>	
<?php   $table_query = "SELECT id, subjects, details, created_at FROM people.bulletin ORDER BY created_at DESC;";
        $table_result = fetch_all($table_query);
        //var_dump($table_result);
        foreach($table_result as$key => $value)
        {
			$date = date_create($value['created_at']);
?>			<h4><?= date_format($date,'m/d/Y') . ' - ' . $value['subjects'] ?></h4><!-- 
		 --><a class = "modify" href="process.php?bulletinid=<?= $value["id"]; ?>&bulletinsubject=<?= $value["subjects"]; ?>">-delete</a> 
			<p class="line"><?= $value['details'] ?></p>			
<?php  }
?>		</div>
	</body>
</html>

<?php 
session_start();
require_once('db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>EXCEL to HTML</title>
	</head>
	<body>
<?php   if (isset($_SESSION['upload-error'])) {
?>		<p class="error-msg"> <?= $_SESSION['upload-error']; ?></p>
<?php
unset($_SESSION['upload-error']); 	
}elseif (isset($_SESSION['upload-success'])) {
?>		<p class="success-msg"><?= $_SESSION['upload-success']; ?></p>
<?php
unset($_SESSION['upload-success']);
}
?>		<form action="process.php" method="post" enctype="multipart/form-data" >
			<input type="file" name="csv_file" accept=".csv" title="Upload CSV file">
			<input type="hidden" name="action" value="upload">
			<input type="submit" value="Upload file ">
		</form>
		<ol>
		<h2>Uploaded Files</h2>
<?php $query = "SELECT * FROM files;";
		$result = fetch_all($query);
		foreach ($result as $value) {
			$csv_name = explode('.',$value['file_name'],2);
			?>
			<li>
				<form action="process.php" method="post">
					<input type="hidden" name="csv_id" value="<?=$value['id']; ?>">
					<input type="hidden" name="csv_path" value="<?=$value['file_path']; ?>">
					<input type="hidden" name="action" value="view-csv">
					<input type="submit" name ="title" value="<?= $csv_name[0]; ?>" class="btn-list">
				</form>
			</li>
<?php		}
?>			
		</ol>
	</body>
</html>
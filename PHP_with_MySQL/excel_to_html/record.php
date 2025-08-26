<?php 
session_start();
require_once('db_connection.php');
//var_dump($_SESSION);
if (isset($_GET['page'])) {
	$page_num = $_GET['page'];
}else {
	$page_num=1;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Records View</title>
	</head>
	<body>
		<h1><?= $_SESSION['current-csv-name'];?></h1>
		<p><a href="process.php">Return to Upload List</a></p>
<?php		for ($pages=1; $pages <= $_SESSION['total-pages']; $pages++) { //line to get the total pages and display as link
?>		<a href="record.php?page=<?=$pages?>"><?= $pages?></a>	
<?php		}
?>		<table>
<?php		ini_set('auto_detect_line_endings', TRUE);	
			$skip = true;
			$path = $_SESSION['current-csv-path'];
			$start = $_SESSION['range-pages'][$page_num]['start'];
			$end = $_SESSION['range-pages'][$page_num]['end'];
			$row = 0;
			if (($handle = fopen($path, "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$num = count($data);
					if ($skip) {//This will skip the header part
?>			<tr>				
<?php					for ($cols=0; $cols < $num; $cols++) {					
?>				<th><?= strtoupper($data[$cols])?></th>		
<?php					}
?>			</tr>
<?php				$row++;
					$skip = false;
					}else {
						if ($row >= $start && $row <= $end) {
?>			<tr class="<?=($row%2===0)?'colored':'default'?>">					
<?php						for ($cols=0; $cols < $num; $cols++) {						
?>				<td><?= $data[$cols]?></td>	
<?php						}
						$row++;					
?>			</tr>
<?php					}else {
							$row++;
							continue;
						}			
					}	
				}	
			fclose($handle);
			}	
?>		</table>	
	</body>
</html>
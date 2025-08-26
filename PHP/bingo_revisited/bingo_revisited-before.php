<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bingo</title>
		<style>
			table{
				border-collapse: collapse;
				font-family: Tahoma, sans-serif;
			}
			td,th{
				border: 2px solid #333;
				height: 100px;
				width: 100px;
				text-align: center;
				font-size: 50px;
			}
			th{
				font-weight: bold;
			}
			.color1{
				color: white;
				background-color: #333;
			}
			.color2{
				color: black;
			}
			h1{
				font-size: 3em;
				letter-spacing: 1.5em;
				margin-left: 35px;
				color: blue;
			}
		</style>
	</head>
	<body>
<?php $bingo= "BINGO"; 
?>		<h1><?=$bingo?></h1>
		<table>
<?php
	for ($row=1; $row <= 5 ; $row++) { 
?>			<tr>
<?php
		for ($cols=1; $cols <= 5; $cols++) {
			$num = $row*$cols;
			if ($row%2===1) {
				if ($cols%2===1) {
?>				<td class ="color1"> <?= $num ?> </td>
<?php			}else{ 
?>				<td class ="color2"> <?= $num ?> </td>
<?php			}
			}else{
				if ($cols%2===0) { 
?>				<td class ="color1"> <?= $num ?> </td>
<?php			}else{ 
?>				<td class ="color2"> <?= $num ?> </td>
<?php			}
			}
		}
?>			</tr>
<?php }
?>		</table>
	</body>
</html>

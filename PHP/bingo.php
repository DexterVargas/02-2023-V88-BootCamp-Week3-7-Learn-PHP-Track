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
			.color2,.color4,.color6{
				color: red;
			}
			th,.color3,.color5{
				color: blue;
			}
		</style>
	</head>
	<body>
	</body>
</html>
<?php
$bingo = "BINGO";
echo "<table>";
for ($row=1; $row <= 6 ; $row++) { 
    echo "<tr>";
    for ($cols=1; $cols <= 5; $cols++) {
		if ($row === 1) {
			echo "<th>{$bingo[$cols-1]}</th>";
		} else {
			$num = $row*$cols;
			echo '<td class ="color'.$row.'">'.$num.'</td>';
		}
    } 
    echo "</tr>";
}
echo "</table>";
?>
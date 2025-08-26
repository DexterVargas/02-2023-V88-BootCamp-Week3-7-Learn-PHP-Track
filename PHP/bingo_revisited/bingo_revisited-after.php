<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bingo</title>
		<style>
			div div{
				width: 100px;
				height: 100px;
				display: inline-block;
				text-align: center;
				line-height: 100px;
				font-size: 3em;
			}
			.color1{
				color: white;
				background-color: #333;
			}
			.color2{
				color: black;
				background-color:whitesmoke;
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
		<h1>BINGO</h1>
<?php $size = 5;
		for ($i=1; $i<= $size; $i++) { 
?>		<div>
<?php		
			for ($j=1; $j <= $size; $j++) { 
?>			<div class='color<?= ($i + $j)%2+1 ?>'><?= $i * $j ?></div>
<?php		}
?>		</div>
<?php
		} 	
?>	</body>
</html>

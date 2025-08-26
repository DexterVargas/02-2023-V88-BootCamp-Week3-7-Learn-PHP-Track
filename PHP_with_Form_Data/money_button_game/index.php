<?php 
session_start();
if(!isset($_SESSION['money'])){
	$_SESSION['money'] = 500;
	$_SESSION['chances'] = 10;
	$_SESSION['game-host'] = array();
}
//$_SESSION = array();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title>Money Button Game</title>
	</head>
	<body>
		<div class="main-container">
			<h1>Your money: <?=$_SESSION['money']; ?></h1><!--
		 --><form method="post" action="process.php" class="form-reset">
				<input type="hidden" name="reset" value="reset-session">
				<input type="submit" value ="Reset" class="reset"> 
			</form>
			<h2>Chances left: <?=$_SESSION['chances']; ?></h2>
			<form action="process.php" method="post" class="low bet-box">
				<input type="hidden" name="risk" value="lowrisk" />
				<h3>Low Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -25 up to 100</label>
			</form>
			<form action="process.php" method="post" class="mod bet-box">
				<input type="hidden" name="risk" value="modrisk" />
				<h3>Moderate Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -100 up to 1000</label>
			</form>
			<form action="process.php" method="post" class="high bet-box">
				<input type="hidden" name="risk" value="highrisk" />
				<h3>High Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -500 up to 2500</label>
			</form>
			<form action="process.php" method="post" class="severe bet-box">
				<input type="hidden" name="risk" value="severerisk" />
				<h3>Severe Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -3000 up to 5000</label>
			</form>
			<label class="game-host">Game Host:</label>
			<ul>
<?php 			$arr = $_SESSION['game-host'];
					foreach ($arr as $value) {
						if(strpos($value, '-')){
?>			    <li class = "decrease"><?=$value ?></li>
<?php					}elseif(strpos($value, '!')){
?>			    <li class ="over"><?=$value ?></li>
<?php					}else {
?>			    <li><?=$value ?></li>
<?php					}
					}
?>		   </ul>
		</div>
	</body>
</html>

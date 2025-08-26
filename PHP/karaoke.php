<?php 
for ($i=1; $i <= 50; $i++) { 
	$score = rand(1,100);
	if ($score<50) {
		echo "<h1> {$score} </h1>";
		echo "<h2> Never sing again, ever!</h2><br>";
	}elseif ($score>=50 && $score<=79) {
		echo "<h1> {$score} </h1>";
		echo "<h2> Practice more!</h2><br>";
	}
	elseif ($score>=80 && $score<=94) {
		echo "<h1> {$score} </h1>";
		echo "<h2> You're getting better!</h2><br>";
	}
	elseif ($score>=95 && $score<=100) {
		echo "<h1> {$score} </h1>";
		echo "<h2> What an excellent singer!</h2><br>";
	}
}
?>
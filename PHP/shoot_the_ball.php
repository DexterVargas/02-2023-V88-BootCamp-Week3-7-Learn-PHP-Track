<?php 
$success = 0;
$fail = 0;
for ($attempt=1; $attempt <= 1000; $attempt++) { 
	$shot = rand(1,2);
	if ($shot === 1) {
		$success+=1;
		echo "Attempt #{$attempt}: Shooting the ball...Success!...Got {$success}x success amd {$fail}x epic fail(s) so far.<br>";
	}else {
		$fail+=1;
		echo "Attempt #{$attempt}: Shooting the ball...Epic Fail!...Got {$success}x success amd {$fail}x epic fail(s) so far.<br>";
	}
}
echo "Practice ended."
?>
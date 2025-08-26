<?php 
    $number = [2, 5, 8, 11, 14];
    $sum = 0;
	for($num = 0; $num <count($number) ;$num++){
        $sum += $number[$num];
	}
   echo $sum;
?>
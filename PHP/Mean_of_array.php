<?php 
    $number = [13, 143, 88, 65, 120];
    $sum = 0;
	for($num = 0; $num <count($number) ;$num++){
        $sum += $number[$num];
	}
   $mean = $sum/count($number);
   echo "The MEAN is : $mean";

?>
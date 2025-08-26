<?php 
#Part I: Create a function called 'exponential()' that reads each value in an array and returns a new array where each value has been computed with default exponent 3.

$digits = array(3,12,30);
function exponentials($arr){
    $arrNew = [];
    for($val = 0; $val<count($arr);$val++){
        $arrNew[] = $arr[$val]**3;
    }
    return $arrNew;
}
$results = exponentials($digits);
var_dump($results);


#Part II: Modify this function so that you can pass an additional argument to this function. The function should compute each value in the array by this additional argument for exponent.

function exponential($arr, $exp){
    $arrNew = [];
    for($val = 0; $val<count($arr);$val++){
        $arrNew[] = $arr[$val]**$exp;
    }
    return $arrNew;
}
$digit = array(8,11, 4);
$result = exponential($digit, 4);  
var_dump($result);

?>


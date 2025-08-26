<?php 
$binary = array(1,1,0,1,0,0,1,0,1,0,1,0,0,0,1,0,1,1,0,1,0,1,0,1,1,1,0,1,0,1);
$output = get_count($binary);
var_dump($output);
function get_count($arr){
    $zeroes = 0;
    $ones = 0;
    foreach ($arr as $value) {
        if ($value === 1) {
            $ones+=1;
        }else {
            $zeroes+=1;
        }
    }
    return array('zeroes'=>$zeroes, 'ones'=>$ones);
}
?>
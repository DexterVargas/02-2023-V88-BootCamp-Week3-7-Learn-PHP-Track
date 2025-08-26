<?php
#Part 1: Create a function called convert_to_blanks() that takes an array of numbers and echo out an underscore, seperated by a space. For example, $list = array(6, 1, 3, 5, 7);
$lists = array(6, 1, 3, 5, 7);
convert_to_blanks($lists);
function convert_to_blanks($blanks){
	foreach ($blanks as $value) {
		for ($underscore=0; $underscore <$value ; $underscore++) { 
			echo '_ ';
		}
		echo "<br>";
	}
}
echo "<hr>";
#Part 2: Modify the function above by allowing array to contain integers and strings and be passed to the convert_to_blanks() function. When a string is passed, display an underscore per character except the first letter of the string. For example: $list = array(4, "Michael", 3, "Karen", 2, "Rogie");
$list = array(4, "Michael", 3, "Karen", 2, "Rogie");
convert_to_blank($list);
function convert_to_blank($blanks){
	foreach ($blanks as $value) {
		if (gettype($value) === 'string') {
			echo $value[0];
			$value = strlen($value)-1;
		}
		for ($underscore=0; $underscore <$value ; $underscore++) { 
			echo '_ ';
		}
		echo "<br>";
	}
}
?>

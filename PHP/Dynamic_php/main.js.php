<?php 
header("Content-type: text/javascript"); 
$better = rand(100,150);
?>

$(document).ready(function(){
	console.log("You are <?= $better?>x better than before!");
});

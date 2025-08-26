<?php 
$cards = array('King' => 13,'Queen' => 12,'Jack' => 11,'Ace' => 1);
//function
function pyramid_solitaire($cards){
    echo "<p> List of keys in the array:</p>";
    echo "<ul>";
    foreach ($cards as $key => $value) {
        echo "<li>{$key}</li>";
    }
    echo "</ul>";
    foreach ($cards as $key => $value) {
        echo "<p>The value of {$key} in Pyramid Solitaire is {$value}.</p>";
    }
}
//invoke function
pyramid_solitaire($cards);
?>
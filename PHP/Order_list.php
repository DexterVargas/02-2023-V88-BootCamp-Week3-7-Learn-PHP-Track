<?php 
function print_orders($foods){
    echo "<ol>";
    foreach ($foods as $food) {
        echo "<li> {$food} </li>";
    }
    echo "</ol>";
}
$menu= array('Spaghetti', 'Pizza', 'Iced tea');
print_orders($menu);
?>
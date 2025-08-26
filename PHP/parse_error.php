<?php
    $array = array("echo", "var_dump");
    echo "<h3>Different ways of debugging:</h3>";//echo and semicolon
    
    echo "<ul>";//echo and semicolon
    for($i = 0; $i < count($array); $i++)//$ sign in i, .length is not valid
    {
      echo '<li>array</li>';//semicolon
    }
    echo "</ul>"; //echo and semicolon
    
    var_dump($array);
    
    echo "<h3>Checking if variable is set:</h3>";//echo, semicolon and " qoute at the end
    $var1 = "var";
    $var2 = "";
    $var3 = '';
    $var4 = null;
    
    
    if(isset($var1, $var2, $var3)){//close paren and open curly braces
        echo "The value of var1, var2, var3 are set.<br>";//echo and " qoute at the end.. added br for new line
    }
    if(!isset($var4)){//close paren and open curly braces
        echo "The value of var4 is null, therefore, not set.<br>";//echo and semicolon. !isset..added br for new line
    }
    if(!isset($var5)){//close paren and open curly braces
       echo  "Non-declared var5 is not set.";//echo and semicolon..!isset
    }
?>
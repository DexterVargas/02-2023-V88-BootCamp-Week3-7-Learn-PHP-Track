<?php 
session_start();
if ($_SESSION['chances']<=0) {
    array_push($_SESSION['game-host'],'**********GAME OVER!***********');
}else {
    $_SESSION['chances'] -= 1;
    if (isset($_POST['risk'])&& $_POST['risk']=='lowrisk' ) {
        $gold = rand(-25,100);
        $risk = 'Low Risk';
    }elseif (isset($_POST['risk'])&& $_POST['risk']=='modrisk' ) {
        $gold = rand(-100,1000);
        $risk = 'Moderate Risk';
    }elseif (isset($_POST['risk'])&& $_POST['risk']=='highrisk' ) {
        $gold = rand(-500,2500);
        $risk = 'High Risk';
    }elseif (isset($_POST['risk'])&& $_POST['risk']=='severerisk' ) {
        $gold = rand(-3000,5000);
        $risk = 'Severe Risk';
    }
    //this is the game log and save into array 
    $_SESSION['money'] +=$gold;
    $betlogs = gmdate("[m/d/Y h:i A]") . ': You push "'.$risk.'". Value is '.$gold.'. Your current money now is '. $_SESSION['money']. ' with '. $_SESSION['chances']. ' chance(s) left';
    //the array. if the chances is 0. will add Game Over!
       array_push($_SESSION['game-host'],$betlogs);
}
if (isset($_POST['reset']) && $_POST['reset'] == 'reset-session') {
    session_destroy();
}
header('Location: index.php');

?>
<?php 
session_start();
if (isset($_POST['submit'])) {
    $_SESSION['toggle_form'] = !$_SESSION['toggle_form'];
    if (!isset($_SESSION['count_coupon'])) {
        $_SESSION['count_coupon'] = 10;
    }else {
        $_SESSION['count_coupon'] -= 1;
    }
    $_SESSION['customer'] = $_POST['name'];
}
if (isset($_POST['claim'])) {
    $_SESSION['toggle_form'] = !$_SESSION['toggle_form'];
}
if (isset($_POST['reset'])) {
    session_destroy();
}
header('Location: index.php')
?>
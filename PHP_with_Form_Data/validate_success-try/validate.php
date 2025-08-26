<?php
session_start();
if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
?>      
        <p><?= $error?></p>
<?php 
    }
}
?>
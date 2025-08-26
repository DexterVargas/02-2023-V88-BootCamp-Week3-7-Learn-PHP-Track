<?php
$ticket_num = rand(100000,200000);
   $img = imagecreate(200, 150);
    $bgcolor = imagecolorallocate($img,rand(1,255),rand(1,255),rand(1,255) );
   $fontcolor = imagecolorallocate($img, rand(100,200), rand(1,205), rand(10,255));
   imagestring($img, 5, 50, 30, "Parokya ni", $fontcolor);
   imagestring($img, 5, 50, 70, "Mang Knorr", $fontcolor);
   imagestring($img, 3, 20, 120, "Ticket No.", $fontcolor);
   imagestring($img, 3, 100, 120, $ticket_num, $fontcolor);
   imageline($img, 5, 90, 195, 90, $fontcolor);
   header("Content-Type: image/png");
   imagepng($img);
   imagedestroy($img);
?>
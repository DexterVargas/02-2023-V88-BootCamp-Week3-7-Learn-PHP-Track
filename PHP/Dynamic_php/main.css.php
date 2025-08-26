<?php header("Content-type: text/css"); 
	$color = array('#7fffd4','#deb887','#5a1e08','#4682b4','#1c8a4c','#ff4500');
	$font = array('15px','20px','25px','30px','35px','40px');
	$randomcolor = rand(1,4);
	$randomfont = rand(1,4);
?>
p { 
    font-size: <?= $font[$randomfont+1] ?>;
	color:<?= $color[$randomcolor-1] ?>;
}
em { 
    font-size: <?= $font[$randomfont-1] ?>;
	color: <?= $color[$randomcolor+1] ?>;
}
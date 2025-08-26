<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Spider Bot</title>
	</head>
	<body>
	<?php
require("simple_html_dom.php");
$html = file_get_html('https://www.bing.com/search?q=software+engineer');
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $html);
// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// $result = curl_exec($curl);
// curl_close($curl);

$limit= 1;
foreach($html->find('li[class*=b_algo]') as $element){ 
	// Find all title 
	foreach($element->find('h2') as $val) {
		echo $val . '<br>';
	}
	// Find all links 
	foreach($element->find('a[href*=//]') as $vals){ 
		echo $vals->href . '<br>';
	}
	if($limit==5) break;
	$limit++;
}
?>	</body>
</html>

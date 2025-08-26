<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ordertaker I</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
		<script>

		</script>

	</head>
	<body>

	<div class="main-container">

		<form action="orders/create_no_ajax" method="post"> 
			<p>
			<input type="text" name="order" placeholder="Type customer's order here">
			</p>    
			<input type="submit" value="Sumbit">
		</form>

		<div class="orders">
<?php  
		foreach($orders as $order){            
?>    		<div class="order">
        	<h1>#: <?= $order['id'] ?></h1>
        	<h2><?= $order['order'] ?></h2>
    		</div>
<?php 
		}  
?>		</div>
	</div>

	</body>
</html>
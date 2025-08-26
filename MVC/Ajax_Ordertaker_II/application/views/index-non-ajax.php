<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ordertaker II</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
	</head>
	<body>

		<div class="main-container">
			<form action="<?= base_url('orders/create_no_ajax') ;?>" method="post"> 
				<p>
				<input type="text" name="order" placeholder="Type customer's order here">
				</p>    
				<input type="submit" value="Sumbit">
			</form>
			<div class="orders"> 
<?php			foreach($orders as $order){            
?>  			<div class="order">
				<form action="<?=base_url('orders/delete_no_ajax/'.$order['id']);?>" method="post">
					<input type="submit" name="remove" value="X" class="remove">
				</form>
				<form action="<?=base_url('orders/update_no_ajax/'.$order['id']);?>" method="post">
					<h1>#: <?= $order['id']?></h1>
					<textarea name="order" class="order_name"><?= $order['order']?></textarea>
					<input type="submit" name="update" value="save" class="update">
				</form>
				</div>	
<?php 			}
?>			</div>	
		</div>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Non-Ajax Search Filter</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
	</head>
	<body>
		<div class="main-container">
			<form action="<?= base_url('products/filter_search') ;?>" method="post"> 
				<p>
				<input type="text" name="name" placeholder="search by name">
				<input type="number" name="min" placeholder="$min" min="0">
				<input type="number" name="max" placeholder="$max" min="0">
				<select name="product_price">
					<option value="asc" selected>Low to High</option>
					<option value="desc">High to Low</option>
				</select>
				<input type="submit" value="Search">
				</p>    
			</form>
			<table>
				<thead>
					<tr>
						<th>Item Name</th>
						<th>Number of Stock</th>
						<th>Price</th>
						<th>Date Added</th>
					</tr>
				</thead>
				<tbody class="products">			
<?php 			if(!empty($products)){
					foreach($products as $key => $value){
?>         			<tr class="<?=($key%2===0)?'colored':'default'?>">
						<td><?= ($value['name']);?></td>
						<td><?= ($value['stock']);?></td>
						<td><?= ($value['price']);?></td>
						<td><?= ($value['created_at']);?></td>
					</tr>
<?php 				}												
				}						
?>				</tbody>
			</table>
		</div>
	</body>
</html>
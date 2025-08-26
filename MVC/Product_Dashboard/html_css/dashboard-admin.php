<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Product Dashboard: Team Ketsup スーパー store</title>
		<script>
		</script>
    </head>
    <body>
		<div class="main-container">
			<div class="logo-container">
				<p><a href="index.php">Team <span class="logo-name">Ketsup</span> <span id="online">スーパー store</span> </a> </p> 
			</div><!--
		 --><ul class="navbar">
				<li><a class="active" href="">Dashboard</a></li>
				<li><a href="">Profile</a></li>
				<li><a href="">Log off</a></li>
			</ul>
			
			<h2 class="service-title">Admin: Manage Product</h2> 
			<section class="items-section">
			<table>
					<p class="product-list"><a class="addnew" href="">Add new</a></p>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Inventory Count</th>
						<th>Quantity Sold</th>
						<th>Action</th>
					</tr>
<?php 			//$totalprice = 0;
				if(!empty($products)){
					foreach($products as $key => $value){
					if($items){
						foreach($items as $id =>$stock){
							if($value['id'] == $id){
								$buy_item = $stock;
							}	
						}
					}
?>         			<tr class="<?=($key%2===0)?'colored':'default'?>">
						<td><?= ($value['name']);?></td>
						<td><?= ($buy_item);?></td>
						<td>$<?= ($value['price']);?></td>
					</tr>
<?php }												
}		
?>				

     						<tr>
								<td>1</td>
								<td>Cap</td>
								<td>120</td>
								<td>50</td>
								<td><a class="btn-action">edit</a> | <a class="btn-action">remove</a></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Map</td>
								<td>120</td>
								<td>50</td>
								<td><a class="btn-action">edit</a> | <a class="btn-action">remove</a></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Vape</td>
								<td>120</td>
								<td>50</td>
								<td><a class="btn-action">edit</a> | <a class="btn-action">remove</a></td>
							</tr>
							<tr>
								<td>4</td>
								<td>Cape</td>
								<td>120</td>
								<td>50</td>
								<td><a class="btn-action">edit</a> | <a class="btn-action">remove</a></td>
							</tr>
							<tr>
								<td>5</td>
								<td>Kape</td>
								<td>120</td>
								<td>50</td>
								<td><a class="btn-action">edit</a> | <a class="btn-action">remove</a></td>
							</tr>
							<tr>
								<td>6</td>
								<td>Hotdog</td>
								<td>120</td>
								<td>50</td>
								<td><a class="btn-action">edit</a> | <a class="btn-action">remove</a></td>
							</tr>

</table>

			</section>
			<footer>
				<p><a href="#"></a></p>
				<p>&copy;Sai Tama. All Rights Reserved</p>
			</footer>
        </div>
    </body>
</html>
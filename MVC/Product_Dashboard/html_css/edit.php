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
			
			<h2 class="service-title">Admin: Manage Product - Edit Product#0001</h2> 

			<div class="name-container">
				
				<form action="" method="POST" class="signup product-form">
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" value="" placeholder="-product name-">
					<label for="desc">Description:</label>
					<textarea name="desc" id="desc" cols="40" rows="7">-product description-</textarea>
					<label for="price">Price:</label>
					<input type="number" name="price" id="price" value="" placeholder="-product price-">
					<label for="count">Inventory Count:</label>
					<input class="item-stock" type="number" name="item_buy" value="1" min="1" max="100">
					<input type="submit" value="Save" id="create">
				</form>
			</div>
			<div class="shop-img-container">
				<img class="shop-pic" src="img/edit.png" alt="shop-photo">
				
			</div>
				</section>
			<footer>
				<p><a href="#"></a></p>
				<p>&copy;Sai Tama. All Rights Reserved</p>
			</footer>
        </div>
    </body>
</html>
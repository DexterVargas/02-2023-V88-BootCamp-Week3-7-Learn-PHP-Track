<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
				<li><a class="active" href="<?= base_url('products') ?>">Dashboard</a></li>
				<li><a href="<?= base_url('users/edit') ?>">Profile</a></li>
				<li><a href="<?= base_url('logoff') ?>">Log off</a></li>
			</ul>
			
			<h2 class="service-title">Admin: Manage Product - Edit Product #<?=$product['id']; ?></h2> 

			<div class="name-container">
				<p class="login-error"><?= $this->session->flashdata('product_input_errors');?></p>
				<form action="<?= base_url('products/update') ?>" method="POST" class="signup product-form">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" value="<?=$product['name']; ?>" placeholder="-product name-">
					<label for="desc">Description:</label>
					<textarea name="desc" id="desc" cols="40" rows="7"><?=$product['description']; ?></textarea>
					<label for="price">Price:</label>
					<input type="number" name="price" id="price" value="<?=$product['price']; ?>" min="1">
					<label for="count">Inventory Count:</label>
					<input type="number" id="count" name="stock" value="<?=$product['stock'] - $product['sold']; ?>" min="1">
					<input type="hidden" name="id" value="<?=$product['id']; ?>">
					<input type="submit" value="Save" id="create">
				</form>
			</div>
			<div class="shop-img-container">
				<img class="shop-pic" src="<?= base_url('assets/img/edit.png')?>" alt="shop-photo">
			</div>
				</section>
				<?php $this->load->view('partials/footer')?>
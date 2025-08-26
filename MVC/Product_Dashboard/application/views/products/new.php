<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
				<li><a class="active" href="<?= base_url('products') ?>">Dashboard</a></li>
				<li><a href="<?= base_url('users/edit') ?>">Profile</a></li>
				<li><a href="<?= base_url('logoff') ?>">Log off</a></li>
			</ul>
			
			<h2 class="service-title">Admin: Manage Product - New Product</h2> 

			<div class="name-container">
				<p class="login-error"><?= $this->session->flashdata('product_input_errors');?></p>
				<form action="<?= base_url('products/create')?>" method="POST" class="product-form">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" value="" placeholder="-product name-">
					<label for="desc">Description:</label>
					<textarea name="desc" id="desc">-product description-</textarea>
					<label for="price">Price:</label>
					<input type="number" name="price" id="price" value="1" min="1">
					<label for="count">Inventory Count:</label>
					<input type="number" id="count" name="stock" value="1" min="1">
					<input type="submit" value="Create" id="create">
				</form>
			</div>
			<div class="shop-img-container">
				<img class="shop-pic" src="<?= base_url('assets/img/add.png')?>" alt="shop-photo">
				
			</div>
				</section>
				<?php $this->load->view('partials/footer')?>
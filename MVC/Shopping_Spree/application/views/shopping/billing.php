<?php $this->load->view('shopping/partials/header')?>

		<div class="main-container">
			<div class="logo-container" data-serialscrolling-target="home">
				<p><a href="<?= base_url('store/');?>">Sai <span class="logo-name">Tama</span> <span id="online">スーパー store</span> </a> </p> 
			</div><!--
		 --><ul class="navbar">
				<li><a href="<?= base_url('store/');?>">Home</a></li>
				<li><a href="<?= base_url('store/catalog');?>">Products</a></li>
				<li><a class="active" href="<?= base_url('store/cart');?>">Cart(<?= ($this->session->userdata('current_cart'))? $this->session->userdata('current_cart') : 0?>)</a></li>
			</ul>
			<h2 class="service-title">Checkout Cart</h2> 
			<section class="items-section">
			<form class="billing" action="" method="POST">
				<p class="actions actions-show"><a href="<?= base_url();?>">Shop more</a> </p>
				<h1>Billing Info</h1>
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" value="">
				<label for="address">Address:</label>
				<input type="text" name="address" id="address" value="">
				<label for="contact_number">Contact Number:</label>
				<input type="text" name="contact_number" id="contact_number" value="" >
				<input class="checkout btn-billing" type="submit" value="Submit Order">
			</form>
			</section>

<?php $this->load->view('shopping/partials/footer')?>
<?php $this->load->view('shopping/partials/header')?>
		
		<div class="main-container">
			<div class="logo-container" data-serialscrolling-target="home">
				<p><a href="<?= base_url();?>">Sai <span class="logo-name">Tama</span> <span id="online">スーパー store</span> </a> </p> 
			</div><!--
		 --><ul class="navbar">
		 		<li><a  class="active" href="<?= base_url();?>">Home</a></li>
				<li><a href="<?= base_url('catalog');?>">Products</a></li>
				<li><a href="<?= base_url('shopping_cart');?>">Cart(<?= (empty($data))? 0 : $data?>)</a></li>
			</ul>
			<section class="user-section">
				<div class="name-container">
					<h1 class="iam-saitama">スーパー Online store</h1>
					<p>Great Deal! Up to 50% discount on selected items!</p>
					<a href="<?= base_url('catalog');?>" class="btn-shop" title="Let's go shopping!">Shop Now</a>
				</div>
				<div class="shop-img-container">
					<img class="shop-pic" src="<?= base_url('/assets/img/OnePunchShopping.gif');?>" alt="saitama-shop-photo">
				</div>
			</section>
			<h2 class="service-title">“Super SALE! Add to cart na!”</h2> 
<?php $this->load->view('shopping/partials/footer')?>
<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
		 		<li><a  class="active" href="<?= base_url();?>">Home</a></li>
				<!-- <li><a href="">Products</a></li>-->
			</ul>
			<section class="user-section">
				<div class="name-container">
					<h1 class="header-title">スーパー Online store</h1>
					<p>Great Deal! Up to 50% discount on selected items!</p>
					<a href="register" class="btn-shop" title="Register now and let's go shopping!">Register&#187;</a>
					<a class="login-link" href="signin">Already have an account? Log in&#187;</a>
				</div>
				<div class="shop-img-container">
					<img class="shop-pic" src="<?= base_url('assets/img/main3.png') ?>" alt="shop-photo">
				</div>
			</section>
			<h2 class="service-title">“Super SALE! Add to cart na!”</h2> 
<?php $this->load->view('partials/footer')?>

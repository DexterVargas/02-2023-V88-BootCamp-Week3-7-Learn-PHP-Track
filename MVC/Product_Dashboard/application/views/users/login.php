<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
		 		
			</ul>
			<section class="user-section">
				<div class="shop-img-container">
					<img class="shop-pic" src="<?= base_url('assets/img/main2.png') ?>" alt="shop-photo">
				</div>
				<div class="name-container">
				<p class="login-error"><?= $this->session->flashdata('input_errors');?></p>
				<form action="signin/validate" method="POST" class="login">
				<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
				<label for="e-mobile">Email Address:</label><input type="text" name="login_email" id="e-mobile" value="" placeholder="Email address">
				<label for="password">Password:</label><input type="password" name="login_password" id="password" value="" placeholder="Enter password">
				<input type="submit" value="Login">
			</form>
					<a class="login-link" href="register">&#171;Don't have an account? Register</a>
				</div>
			</section>
			<h2 class="service-title">“Super SALE! Add to cart na!”</h2> 
			<?php $this->load->view('partials/footer')?>
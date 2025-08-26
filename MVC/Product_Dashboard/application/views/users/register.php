<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
		 		
			</ul>
			<section class="user-section">
				
				<div class="name-container">
				<p class="login-error"><?= $this->session->flashdata('input_errors');?></p>
			
			<form action="register/validate" method="POST" class="signup-form">
				<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" value="" placeholder="email@mail.com">
				<label class="form-label"  for="first_name">First Name:</label>
				<input type="text" name="first_name" id="first_name" value="" placeholder="First name">
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" id="last_name" value="" placeholder="Last name">
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" value="" placeholder="password">
				<label for="confirm-password">Confirm Password:</label>
				<input type="password" name="confirm-password" id="confirm-password" value="" placeholder="confirm password">
				<input type="submit" value="Signup">
			</form>
			<a class="login-link" href="signin">Already have an account? Log in&#187;</a>
				</div>
				<div class="shop-img-container">
					<img class="shop-pic" src="<?= base_url('assets/img/main4.png') ?>" alt="shop-photo">
				</div>
			</section>
			<h2 class="service-title">“Super SALE! Add to cart na!”</h2> 
			<?php $this->load->view('partials/footer')?>
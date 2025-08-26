<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
		 		<li><a href="<?= base_url('products/admin') ?>">Dashboard</a></li>
				<li><a class="active"  href="<?= base_url('users/edit') ?>">Profile</a></li>
				<li><a href="<?= base_url('logoff') ?>">Log off</a></li>
			</ul>
			
			<h2 class="service-title">Edit Profile Info</h2> 

				<div class="name-container edit-user">
				
			<form action="<?= base_url('users/edit/info') ?>" method="POST" class="signup signup-form">

				<p class="success_action"><?= $this->session->flashdata('user_update_success');?></p>
				<p class="login-error"><?= $this->session->flashdata('user_update_errors');?></p>

				<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
				<h1>Edit Information</h1>
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" value="<?= $user['email'];?>" placeholder="-email@mail.com-" disabled>
				<label class="form-label"  for="first_name">First Name:</label>
				<input type="text" name="first_name" id="first_name" value="<?= $user['first_name'];?>" placeholder="-first name-">
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" id="last_name" value="<?= $user['last_name'];?>" placeholder="-last name-">
				<input type="submit" value="Save">
			</form>

				</div>
				<div class="name-container edit-user">
				
				<form action="<?= base_url('users/edit/password') ?>" method="POST" class="signup signup-form">

					<p class="success_action"><?= $this->session->flashdata('user_update_pass_success');?></p>
					<p class="login-error"><?= $this->session->flashdata('user_update_pass_errors');?></p>

					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
					<h1>Change Password</h1>
					<label for="old_password">Old Password:</label>
					<input type="password" name="old_password" id="old_password" value="" placeholder="-old-password-">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" value="" placeholder="-password-">
					<label for="confirm_password">Confirm Password:</label>
					<input type="password" name="confirm_password" id="confirm_password" value="" placeholder="-confirm password-">
					<input type="submit" value="Save">
				</form>
	
					</div>
			</section>
			<?php $this->load->view('partials/footer')?>
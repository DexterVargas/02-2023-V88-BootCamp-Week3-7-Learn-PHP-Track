<?php $this->load->view('users/partials/header')?>
		
		<fieldset>
			<p class="login-error"><?= (!$this->session->flashdata('create_failed'))?null: $this->session->flashdata('create_failed');?></p>
			<p class="success-create"><?= (!$this->session->flashdata('create_success'))?null: $this->session->flashdata('create_success');?></p>
			<form action="<?= base_url('users/create');?>" method="POST" class="signup">
<?php $this->load->library("form_validation"); 
				echo validation_errors();
?>				<label for="first_name">First Name:</label>
				<input type="text" name="first_name" id="first_name" value="<?=set_value('first_name'); ?>" placeholder="First name">
				<label for="last_name">Last Name:</label>
				<input type="text" name="last_name" id="last_name" value="<?=set_value('last_name'); ?>" placeholder="Last name">
				<label for="contact_number">Contact Number:</label>
				<input type="text" name="contact_number" id="contact_number" value="<?=set_value('contact_number'); ?>" placeholder="Mobile Number" >
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" value="<?=set_value('email'); ?>" placeholder="email@mail.com">
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" value="<?=set_value('password'); ?>" placeholder="password">
				<label for="confirm-password">Password:</label>
				<input type="password" name="confirm-password" id="confirm-password" value="<?=set_value('confirm-password'); ?>" placeholder="confirm password">
				<input type="submit" value="Create" id="create">
			</form>
			<legend><h1>Sign Up</h1></legend>
		</fieldset>
		<fieldset>
			<p class="login-error"><?= (!$this->session->flashdata('login_error'))?null: $this->session->flashdata('login_error');?></p>
			<form action="<?= base_url('users/profile');?>" method="POST" class="login">
				<label for="e-mobile">Email/Mobile No.:</label><input type="text" name="login_user" id="e-mobile" value="" placeholder="Email or Mobile Number">
				<label for="password">Password:</label><input type="password" name="login_password" id="password" value="" placeholder="Enter password">
				<input type="submit" value="Login">
			</form>
			<legend><h1>Log In</h1></legend>
		</fieldset>
<?php $this->load->view('users/partials/footer')?>
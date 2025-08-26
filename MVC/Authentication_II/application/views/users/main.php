<?php $this->load->view('users/partials/header')?>
<?php 
	// $get_id = $this->session->userdata('user_id');
	// //var_dump($get_id);
	// $this->load->model("users/User"); 
	// $result = $this->User->get_user_by_id($get_id); 
	// var_dump($result);
?>
		<p class="actions actions-show"><a href="<?= base_url('/users/profile/logout');?>">Log out</a> </p>
		<fieldset class="main">
			<form class="main">
				<label>First Name:</label><input type="text" name="first_name" value="<?= $this->session->userdata('user_first_name');?>" disabled>
				<label>Last Name:</label><input type="text" name="last_name" value="<?= $this->session->userdata('user_last_name');?>" disabled>
				<label>Contact Number:</label><input type="text" name="contact_number"  value="<?= $this->session->userdata('user_contact_number');?>" disabled>
				<!-- I'm not sure if i will make a column "failed_date_at" in the database every failed login attemp.  So just for now i will use the "updated_at" column-->
				<label>Last failed login:</label><input type="text" name="date"  value="<?= $this->session->userdata('failed_login');?>" disabled> 
			</form>
			<legend><h1>Basic Information</h1></legend>
		</fieldset>
<?php $this->load->view('users/partials/footer')?>

<?php $this->load->view('contacts/partials/header')?>
		<form action="<?= base_url('contacts/create');?>" method="POST">
			<p class="actions actions-show"><a href="<?= base_url();?>">Go back</a> </p>
			<h1>Add new contact</h1>
			<?php $this->load->library("form_validation"); 
						echo validation_errors();?>
			<label for="name">Name:</label><input type="text" name="name" id="name" value="<?=set_value('name'); ?>">
			<label for="contact_number">Contact Number:</label><input type="text" name="contact_number" id="contact_number" value="<?=set_value('contact_number'); ?>" >
			<input type="submit" value="Create">
		</form>
<?php $this->load->view('contacts/partials/footer')?>

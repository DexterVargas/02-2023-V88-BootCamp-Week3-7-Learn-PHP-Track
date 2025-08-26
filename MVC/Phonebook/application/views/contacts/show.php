<?php $this->load->view('contacts/partials/header')?>
		<form>
			<p class="actions actions-show"><a href="<?= base_url();?>">Go back</a> | <a href="<?= base_url('contacts/edit/'.$id);?>">Edit</a></p>
			<h1>Contact #<?= $id;?> here</h1>
			<label for="show-name">Name:</label><input type="text" name="name" id="show-name" value="<?= $name;?>" disabled>
			<label for="show-contact_number">Contact Number:</label><input type="text" name="contact_number" id="show-contact_number" value="<?= $contact_number;?>" disabled>
		</form>
<?php $this->load->view('contacts/partials/footer')?>

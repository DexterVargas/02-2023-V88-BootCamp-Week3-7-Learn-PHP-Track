<?php $this->load->view('contacts/partials/header')?>
		<form action="<?= base_url('contacts/update/'.$id);?>" method="POST">
			<p class="actions actions-show"><a href="<?= base_url();?>">Go back</a> | <a href="<?= base_url('contacts/show/'.$id);?>">Show</a></p>
			<h1>Edit Contact #<?= $id;?></h1>
			<?php $this->load->library("form_validation"); 
						echo validation_errors();?>
			<label for="name">Name:</label><input type="text" name="name" id="name" value="<?= $name;?>">
			<label for="contact_number">Contact Number:</label><input type="text" name="contact_number" id="contact_number" value="<?= $contact_number;?>" >
			<input type="submit" value="Save">
		</form>
<?php $this->load->view('contacts/partials/footer')?>

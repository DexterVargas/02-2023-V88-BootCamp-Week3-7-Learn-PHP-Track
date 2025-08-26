<?php $this->load->view('contacts/partials/header')?>
		
		<h1 class="title">Contacts</h1>
		<p class="success-delete"><?= (!$this->session->flashdata('delete'))?null: $this->session->flashdata('delete');?></p>
		<p class="success-delete"><?= (!$this->session->flashdata('update'))?null: $this->session->flashdata('update');?></p>
		<p class="success-create"><?= (!$this->session->flashdata('create'))?null: $this->session->flashdata('create');?></p>
		<table>
			<tr>
				<th>Name</th>
				<th>Contact Number</th>
				<th>Actions</th>
			</tr>
<?php foreach($data as $key => $value){
	
?>          <tr class="<?=($key%2===0)?'colored':'default'?>">
                <td><?= $value['name'];?></td>
				<td><?= $value['contact_number'];?></td>
				<td><a href="contacts/show/<?= $value['id'];?>">Show</a> | <a href="contacts/edit/<?= $value['id'];?>">Edit</a> | <form action="<?= base_url('contacts/destroy/');?>" method="POST" id="remove-form">
				<input type="hidden" name="id" value="<?= $value['id'];?>"><input id="remove-btn" type="submit" value="Remove"></form></td>
            </tr>
<?php
  }	
?>		</table>
		<p class="actions actions-show"><a href="contacts/new">Add new contact</a> </p>
<?php $this->load->view('contacts/partials/footer')?>

<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
				<li><a class="active" href="<?= base_url('products') ?>">Dashboard</a></li>
				<li><a href="<?= base_url('users/edit') ?>">Profile</a></li>
				<li><a href="<?= base_url('logoff') ?>">Log off</a></li>
			</ul>
			
			<h2 class="service-title">Admin: Manage Product</h2> 
			<section class="items-section">
				<!-- ayaw lumabas debbug later-->
			<p class="success_delete"><?= $this->session->flashdata('delete');?></p>
			<p class="success_action"><?= $this->session->flashdata('product_input_success');?></p>
			<table>
					<p class="product-list"><a class="addnew" href="<?= base_url('products/new/') ?>">Add new</a></p>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Inventory Count</th>
						<th>Quantity Sold</th>
						<th>Action</th>
					</tr>
<?php 			//$totalprice = 0;
				if(!empty($products)){
					foreach($products as $key => $value){        			
?>						<tr class="<?=($key%2===0)?'colored':'default'?>">
							<td><?= ($value['id']);?></td>
							<td><a class="product-link-social" href="<?= base_url('products/show/'.$value['id']);?>" title="Click to view product information"><?= ($value['name']);?></a></td>
							<td><?= ($value['stock']);?></td>
							<td><?= ($value['sold']);?></td>
							<td><a href="<?= base_url('products/edit/'.$value['id']);?>" class="btn-action">edit</a> | <a href="products/delete/<?= $value['id'];?>" class="btn-action">remove</a></td>
						</tr>
<?php }												
}		
?>			</table>

			</section>
			<?php $this->load->view('partials/footer')?>
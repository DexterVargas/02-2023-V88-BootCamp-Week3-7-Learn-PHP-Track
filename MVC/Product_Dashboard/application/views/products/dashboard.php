<?php $this->load->view('partials/header')?>
		 --><ul class="navbar">
		 		<li><a class="active" href="<?= base_url('products') ?>">Dashboard</a></li>
				<li><a href="<?= base_url('users/edit') ?>">Profile</a></li>
				<li><a href="<?= base_url('logoff') ?>">Log off</a></li>
			</ul>
			
			<h2 class="service-title">All Products</h2> 
			<section class="items-section">
			<table>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Inventory Count</th>
						<th>Quantity Sold</th>
					</tr>
<?php 			//$totalprice = 0;
				if(!empty($products)){
					foreach($products as $key => $value){
?>         			<tr class="<?=($key%2===0)?'colored':'default'?>">
						<td><?= ($value['id']);?></td>
						<td><a class="product-link-social" href="<?= base_url('products/show/'.$value['id']);?>" title="Click to view product information"><?= ($value['name']);?></a></td>
						<td><?= ($value['stock']);?></td>
						<td><?= ($value['sold']);?></td>
					</tr>
<?php 				}												
				}						
?>			</table>
			</section>
			<?php $this->load->view('partials/footer')?>
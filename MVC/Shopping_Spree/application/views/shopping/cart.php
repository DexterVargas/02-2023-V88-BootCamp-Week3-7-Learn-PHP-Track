<?php $this->load->view('shopping/partials/header')?>
		
		<div class="main-container">
			<div class="logo-container" data-serialscrolling-target="home">
				<p><a href="<?= base_url('store/');?>">Sai <span class="logo-name">Tama</span> <span id="online">スーパー store</span> </a> </p> 
			</div><!--
		 --><ul class="navbar">
				<li><a href="<?= base_url('store/');?>">Home</a></li>
				<li><a href="<?= base_url('store/catalog');?>">Products</a></li>
				<li><a class="active" href="<?= base_url('store/cart');?>">Cart(<?= ($this->session->userdata('current_cart'))? $this->session->userdata('current_cart') : 0?>)</a></li>
			</ul>
			<h2 class="service-title">My Cart</h2> 
			<p class="success_delete"><?= (!$this->session->flashdata('success_delete'))?null: $this->session->flashdata('success_delete');?></p>
			<section class="items-section">
				<table>
					<p class="total-price">Total: <span>$<?= ($this->session->userdata('total'))? $this->session->userdata('total') : 0?></span></p>
					<tr>
						<th>Item Name</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
<?php 			$total = 0;
				if(!empty($data)){
					foreach($data as $key => $value){
					if($this->session->userdata('cart')){
						$items = $this->session->userdata('cart');
						foreach($items as $id =>$stock){
							if($value['id'] == $id){
								$buy_item = $stock;
							}	
						}
					}
?>         			<tr class="<?=($key%2===0)?'colored':'default'?>">
						<td><?= ($value['name'])?$value['name']:'NA';?></td>
						<td><?= ($buy_item)?$buy_item:'NA';?></td>
						<td>$<?= ($value['price'])?$value['price']:'NA';?></td>
						<td>
							<form action="<?= base_url('store/removecart');?>" method="POST" id="remove-form">
								<input type="hidden" name="id" value="<?= ($value['id'])?$value['id']:null;?>">
								<input class="btn-remove" type="submit" value="X">
							</form>
						</td>
					</tr>
<?php }												
}		
?>				</table>
				<p class="total-price"><a class="checkout" href="<?= base_url('store/billing');?>">Checkout</a></p>
			</section>
<?php $this->load->view('shopping/partials/footer')?>
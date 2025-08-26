<?php $this->load->view('shopping/partials/header')?>

		<div class="main-container">
			<div class="logo-container" data-serialscrolling-target="home">
				<p><a href="<?= base_url('store/');?>">Sai <span class="logo-name">Tama</span> <span id="online">スーパー store</span> </a> </p> 
			</div><!--
		 --><ul class="navbar">
				<li><a href="<?= base_url('store/');?>">Home</a></li>
				<li><a  class="active" href="<?= base_url('store/catalog');?>">Products</a></li>
				<li><a href="<?= base_url('store/cart');?>">Cart(<?= ($this->session->userdata('current_cart'))? $this->session->userdata('current_cart') : 0?>)</a></li>
			</ul>
			<h2 class="service-title">Our Products</h2> 
			<p class="success_action"><?= (!$this->session->flashdata('success_action'))?null: $this->session->flashdata('success_action');?></p>
			<section class="items-section">
				<h2>&#171;Product List&#187;</h2> 
<?php foreach($data as $key => $value){	
?>				<form class="items" action="<?= base_url('store/addcart');?>" method="POST" >
					<input type="image" src="<?= base_url('/assets/img/'. $value['product_image'].'');?>" alt="item-thumbnails" disabled>
					<label class="item-name"><?= $value['name'];?></label><label class="item-price">$<?= $value['price'];?></label>
					<input class="item-stock" type="number" name="item_buy" value="1" min="1" max="<?= $value['quantity'];?>">
					<input type="hidden" name="item_id" value="<?= $value['id'];?>">
					<input class="item-buy" type="submit" value="Buy">
				</form>
<?php }
?>			</section>
<?php $this->load->view('shopping/partials/footer')?>


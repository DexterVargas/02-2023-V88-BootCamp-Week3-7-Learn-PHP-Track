<?php $this->load->view('shopping/partials/header')?>
		
		<div class="main-container">
			<div class="logo-container" data-serialscrolling-target="home">
				<p><a href="<?= base_url();?>">Sai <span class="logo-name">Tama</span> <span id="online">スーパー store</span> </a> </p> 
			</div><!--
		 --><ul class="navbar">
				<li><a href="<?= base_url();?>">Home</a></li>
				<li><a href="<?= base_url('catalog');?>">Products</a></li>
				<li><a class="active" href="<?= base_url('shopping_cart');?>">Cart(<?= (empty($data))? 0 : $data?>)</a></li>
			</ul>
			<h2 class="service-title">My Cart</h2> 
			<p class="success_delete"><?= (empty($success_delete))? null : $success_delete?></p>
			<section class="items-section">
				<table>
					<p class="total-price">Total: <span>$<?= (empty($total))? 0 : $total?></span></p>
					<tr>
						<th>Item Name</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
<?php 			//$totalprice = 0;
				if(!empty($products)){
					foreach($products as $key => $value){
					if($items){
						foreach($items as $id =>$stock){
							if($value['id'] == $id){
								$buy_item = $stock;
							}	
						}
					}
?>         			<tr class="<?=($key%2===0)?'colored':'default'?>">
						<td><?= ($value['name']);?></td>
						<td><?= ($buy_item);?></td>
						<td>$<?= ($value['price']);?></td>
						<td>
							<?=form_open('removecart', ['id'=>'remove-form']);						
?>								<input type="hidden" name="id" value="<?= $value['id'];?>">
								<input class="btn-remove" type="submit" value="X">
							</form>
						</td>
					</tr>
<?php }												
}		
?>				</table>
				<p class="total-price"><a class="checkout" href="<?= base_url('billing');?>">Checkout</a></p>
			</section>
<?php $this->load->view('shopping/partials/footer')?>
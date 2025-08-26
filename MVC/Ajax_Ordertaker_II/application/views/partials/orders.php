<?php			foreach($orders as $order){            
?>  			<div class="order">
				<form action="<?=base_url('orders/delete/'.$order['id']);?>" method="post">
					<input type="submit" name="remove" value="X" class="remove">
				</form>
				<form action="<?=base_url('orders/update_order/'.$order['id']);?>" method="post">
					<h1>#: <?= $order['id']?></h1>
					<textarea name="order" class="order_name"><?= $order['order']?></textarea>
					<!-- <input type="submit" name="update" value="save" class="update"> -->
				</form>
				</div>	
<?php 			}
?>
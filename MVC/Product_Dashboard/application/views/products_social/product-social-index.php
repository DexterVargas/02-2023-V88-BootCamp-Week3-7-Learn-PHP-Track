<?php $this->load->view('partials/header')?>
		 
		 --><ul class="navbar">
		 		<li><a class="active" href="">Socials</a></li>
				<li><a href="<?= base_url('products') ?>">Dashboard</a></li>
				<li><a href="<?= base_url('users/edit') ?>">Profile</a></li>
				<li><a href="<?= base_url('logoff') ?>">Log off</a></li>
			</ul>
			<h2 class="service-title"><?= $product['name']; ?> ($<?= number_format($product['price'], 2); ?>)</h2>
			<section class="social-section ">
				<div class="product-img-container">
					<img class="product-image" src="<?= base_url('assets/img/main2.png') ?>" alt="product-photo">
					<p><b>Added Since: </b>  <?= $product['created_at']; ?></p>
					<p><b>Product ID: # </b><?= $product['id']; ?></p>
					<p><b>Description: </b> <?= $product['description']; ?></p>
					<p><b>Total sold: </b> <?= $product['sold']; ?></p>
					<p><b>Number of available stocks: </b> <?=$product['stock'] - $product['sold']; ?></p>
				</div>
				<div class="name-container social-container">
					<p class="login-error"><?=$this->session->flashdata('social_input_errors'); ?></p>
					<form action="<?= base_url('products/add_message'); ?>" method="post" class="form message-form">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
						<input type="hidden" name="prod_id" value="<?= $product['id']; ?>">
						<label for="comment_input">Post a message</label>
						<textarea class="product-social" name="message_input" placeholder="Create a message......"></textarea>
						<input type="submit" value="Post a message"/>
					</form>
<?php			foreach($all_msg_comments as $by_msg){
?>						<div class="message-container">
						<p class="message-title"><?= $by_msg['message_sender_name'];?> - <?= $by_msg['message_date']; ?></p>
						<p class="message-content"><?= $by_msg['message_content'];?></p>
					</div>			
<?php					foreach($by_msg['comments'] as $by_comment){
?>						<div class="comment-container">
						<p class="comment-title"><?= $by_comment['comment_sender_name'];?> - <?= $by_comment['comment_date']; ?></p>
						<p class="comment-content"><?= $by_comment['comment_content'];?></p>
					</div>
<?php					}
?>          			<form action="<?= base_url('products/add_comment'); ?>" method="post" class="form comment-form">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
						<input type="hidden" name="prod_id" value="<?= $product['id']; ?>">
						<input type="hidden" name="message_id" value="<?= $by_msg['message_id'];?>"/>
						<label for="comment_input">Post a comment</label>
						<textarea class="product-social comment" name="comment_input" placeholder="Comment on the message......"></textarea>               
						<input type="submit" value="Post a comment"/>
					</form>
<?php          }
?>				</div>
			</section>
<?php $this->load->view('partials/footer')?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Confirm Delete</title>
		<style>
			.confirm-container{
				width: 50%;
				margin: 0 auto;
				padding: 30px;
				border: 1px solid #222;
				text-align: center;
				background-color:rgba(248, 161, 145,.2);
			}
			.destroy{
				display: inline-block;
				width: 50%;
			}
			.btn-destroy{
				border: none;
				background-color: rgba(87, 151, 236,.7);
				color: #ffff;
				border-radius: 5px;
				padding: 5px 20px;
				margin-top: 10px;
				display: inline-block;
			}
			.btn-destroy:hover{
				background-color: rgb(5, 104, 233);
				font-weight: bold;
			}
			.btn-no{
				background-color:rgba(248, 161, 145,.7);
				transition-duration: 0.4s;
			}
			.btn-no:hover{
				background-color:rgb(250, 15, 62);
			}




		</style>
	</head>
	<body>
		<div class="confirm-container">
			<p>Are you sure you want to delete?</p>
			<p>Product ID# <?=$id; ?>  : Product Name:  <?=$name; ?></a></p>
			<form action="<?= base_url();?>" method="post" class="destroy">
				<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
				<input class="btn-destroy btn-no" type="submit" value="No">
			</form><!-- 
		--><form action="<?=base_url('products/delete') ?>" method="post" class="destroy">
				<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
				<input type="hidden" name="id" value="<?=$id;?>">
				<input class="btn-destroy btn-yes" type="submit" value="Yes, I want to delete">
			</form>
		</div>

	</body>
</html>



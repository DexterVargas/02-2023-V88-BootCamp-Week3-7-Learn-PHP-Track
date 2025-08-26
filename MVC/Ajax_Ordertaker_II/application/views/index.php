<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ordertaker II</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
		<script>
			$(document).ready(function(){
			// $.get('orders/index_html', function(res) {
			// 	$('.orders').html(res);
			// });
			$(document).on('submit','form', function(){
				$.post($(this).attr('action'), $(this).serialize(), function(res) {
					$('.orders').html(res);
				});
				return false;
			});
			$(document).on('change', '.order_name',function (data) {
				$(this).parent().submit();
			});
			$('form').submit();
			});
		</script>
	</head>
	<body>
		<div class="main-container">
			<form action="orders/create" method="post"> 
				<p>
				<input type="text" name="order" placeholder="Type customer's order here">
				</p>    
				<input type="submit" value="Sumbit">
			</form>
			<div class="orders">
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ajax PAGINATION: Search Filter</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
		<script>
			$(document).ready(function(){
			$.get('products/index_html', function(res) {
				$('.products').html(res);
			});

			$(document).on('submit','form', function(){
				$.post($(this).attr('action'), $(this).serialize(), function(res) {
					$('.products').html(res);
				});
				return false;
			});

			$(document).on('change', 'input, select',function (data) {
				$(this).parent().submit();
			});

			//click page number
			$(document).on('click', 'a',function (data) {
					$url = $(this).attr('href');
					$.get($url, function(res) {
						$('.products').html(res);
					});
					return false;
			});
			//$('form').submit();
			});
		</script>
	</head>
	<body>
	<h1>With Ajax Pagination: Search Filter </h1>
		<div class="main-container">
		<form action="<?= base_url('products/filter_search') ;?>" method="post"> 
				<p>
				<input type="text" name="name" placeholder="search by name">
				<input type="number" name="min" placeholder="$min" min="0">
				<input type="number" name="max" placeholder="$max" min="0">
				<select name="product_price">
					<option value="asc" selected>Low to High</option>
					<option value="desc">High to Low</option>
				</select>
				<!-- <input type="submit" value="Search"> -->
				</p>    
			</form>
			<div class="products">

			</div>
		</div>
	</body>
</html>
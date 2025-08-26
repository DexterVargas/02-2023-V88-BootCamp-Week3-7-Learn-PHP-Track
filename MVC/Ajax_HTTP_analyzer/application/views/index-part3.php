<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SIMSIMI ChatBot</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
		<script>
			$(document).ready(function() {
				$('form').submit(function() {
					$.post($(this).attr('action'), $(this).serialize(), function(res) {
						$('#display').html(res);
					});
					return false;
				});
			});
		</script>
	</head>
	<body>
		<form action="api/http_analyzer/html" method="post">
			<h1>URL to fetch by AJAX</h1>
			<input name="url" type="text">
			<input type="submit" value="Fetch">
		</form>
		<div  id="display">
		</div>
	</body>
</html>
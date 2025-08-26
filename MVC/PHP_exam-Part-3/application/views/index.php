<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>All Assignments
		</title>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script>
			$(document).ready(function(){
				$(document).on('submit','form', function(){
					$.post($(this).attr('action'), $(this).serialize(), function(res) {
						$('.assignment').html(res);
						$('.count-row').html($('.count').length);
					});
					return false;
				});
				$(document).on('change click', 'input, select, input.check',function (data) {
					$(this).parent().submit();
				});
				$('form').submit();
			});
		</script>
	</head>
	</head>
	<body>
		<div class="main-container">
			<h1><span class="count-row"></span>  All Assignments</h1>
			<form action="<?= base_url('assignments/search') ;?>" method="post">
				<p>
				<label><input type="checkbox" name="easy" value="Easy"/>Easy</label>
				<label><input type="checkbox" name="intermediate" value="Intermediate"/>Intermediate</label>
				<select name="track">
					<option selected></option>
					<option value="Introduction">Introduction</option>
					<option value="Web Fundamentals">Web Fundamentals</option>
					<option value="PHP">PHP</option>
				</select>
				<!-- <input type="submit" value="Update"> -->
				</p>    
			</form>
			<table>
				<thead>
					<tr>
						<th>Assignment</th>
						<th>Sequence num</th>
						<th>Level</th>
						<th>Track</th>
					</tr>
				</thead>
				<tbody class="assignment">
				</tbody>
			</table>
		</div>
	</body>
</html>
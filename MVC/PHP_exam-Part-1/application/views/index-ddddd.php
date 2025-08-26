<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ajax Search Filter</title>
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
			$('form').submit();
			});
		</script>
	</head>
	<body>
		<div class="main-container">
			<h1>All Assignments</h1>
			<table>
				<thead>
					<tr>
						<th>Assignment</th>
						<th>Sequence num</th>
						<th>Level</th>
						<th>Track</th>
					</tr>
				</thead>
				<tbody class="products">
<?php 		if(!empty($assignments)){
				foreach($assignments as $key => $value){
?>         			<tr class="<?=($key%2===0)?'colored':'default'?>">
						<td><?= ($value['assignment']);?></td>
						<td><?= ($value['sequence_num']);?></td>
						<td><?= ($value['level']);?></td>
						<td><?= ($value['track']);?></td>
					</tr>
<?php 				}												
				}									
?>				</tbody>
			</table>
			<form action="<?= base_url('assignments/'.count($assignments)+5) ;?>" method="post"> 
				<input type="submit" value="Show more">
			</form>
		</div>
	</body>
</html>
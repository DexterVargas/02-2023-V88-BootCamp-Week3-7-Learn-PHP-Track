<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>All Assignments
		</title>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<script>
		</script>
	</head>
	<body>
		<div class="main-container">
			<h1><?= $pagecount;?>   All Assignments</h1>
			<form action="<?= base_url('assignments/search') ;?>" method="post">
			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" /> 
				<p>
				<label><input type="checkbox" name="easy" value="Easy"/>Easy</label>
				<label><input type="checkbox" name="intermediate" value="Intermediate"/>Intermediate</label>
				<select name="track">
					<option selected></option>
					<option value="Introduction">Introduction</option>
					<option value="Web Fundamentals">Web Fundamentals</option>
					<option value="PHP">PHP</option>
				</select>
				<input type="submit" value="Update">
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
		</div>
	</body>
</html>
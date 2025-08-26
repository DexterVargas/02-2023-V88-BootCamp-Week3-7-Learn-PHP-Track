<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>All Assignments	
<?php    if (!empty($pagecount)){?>
 			- showing <?= $pagecount?> rows
<?php 	 } ?>
		</title>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<script>
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
				$show = 5;
			if (!empty($total_row['count'])) {
				$total_ramaining = (intVal($total_row['count']) - intVal($pagecount));
				if ($total_ramaining<=4) {
					$show = $total_ramaining;
				}else{
					$show += 5;
				}
			}								
?>				</tbody>
			</table>
			<form action="<?= base_url('assignments/'.(count($assignments)+$show)) ;?>" method="post"> 
				<input type="submit" value="Show more">
			</form>
		</div>
	</body>
</html>
<?php 		if(!empty($assignments)){
				foreach($assignments as $key => $value){
?>         			<tr class="<?=($key%2===0)?'colored':'default'?> count">
						<td><?= ($value['assignment']);?></td>
						<td><?= ($value['sequence_num']);?></td>
						<td><?= ($value['level']);?></td>
						<td><?= ($value['track']);?></td>
					</tr>
<?php 				}												
				}								
?>


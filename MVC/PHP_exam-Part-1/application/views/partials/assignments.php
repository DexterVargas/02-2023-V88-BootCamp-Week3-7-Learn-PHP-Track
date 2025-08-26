<?php 			if(!empty($products)){
					foreach($products as $key => $value){
?>         			<tr class="<?=($key%2===0)?'colored':'default'?>">
						<td><?= ($value['name']);?></td>
						<td><?= ($value['stock']);?></td>
						<td><?= ($value['price']);?></td>
						<td><?= ($value['created_at']);?></td>
					</tr>
<?php 				}												
				}						
?>



<table>
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Number of Stock</th>
							<th>Price</th>
							<th>Date Added</th>
						</tr>
					</thead>
					<tbody>		
<?php 				if(!empty($products)){
						foreach($products as $key => $value){
?>         				<tr class="<?=($key%2===0)?'colored':'default'?>">
							<td><?= ($value['name']);?></td>
							<td><?= ($value['stock']);?></td>
							<td><?= ($value['price']);?></td>
							<td><?= ($value['created_at']);?></td>
						</tr>
<?php 					}												
					}						
?>					</tbody>
				</table>
				<p class="pagination">
<?php 				if(!empty($table_control)){
						for($page=1; $page <= $table_control['pages'];$page++){
							if ($this->session->userdata('page')) {
?>							<a class="main" href="<?= base_url('products/paginate/'.$page);?>"><?= ($page);?></a>
<?php						}else{
?>							<a class="filter" href="<?= base_url('products/filter_search_paginate/'.$page);?>"><?= ($page);?></a>
<?php						}					
 						}												
					}						
?>				</p>
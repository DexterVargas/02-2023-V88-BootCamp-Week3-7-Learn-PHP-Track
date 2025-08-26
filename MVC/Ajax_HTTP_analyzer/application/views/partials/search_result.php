		<div class="html-analyzer">
		<h2>HTML Tag Analyzer</h2>
			<table>
				<thead>
					<tr>
						<th>HTML Tags</th>
						<th>Number of appearance</th>
					</tr>
				</thead>
				<tbody>
<?php 				if(!empty($tags)){
						$counter = 0;
						foreach($tags as $key => $value){
?>         				<tr class="<?=($counter%2===0)?'colored':'default'?>">
							<td><?= $key;?></td>
							<td><?= $value;?></td>
						</tr>
<?php 					$counter++;
						}												
					}									
?>				</tbody>
			</table>
		</div>
		<div class="http-response">
			<h2>HTTP Response:</h2>
			<textarea name="http" id="http"><?= $all_html;?></textarea>			
		</div>

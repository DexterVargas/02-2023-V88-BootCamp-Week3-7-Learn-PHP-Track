<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>EXCEL to HTML</title>
		<style>
			table{
				border-collapse: collapse;
				font-family: Tahoma, sans-serif;
			}
			td,th{
				border: 2px solid #333;
				height: 100px;
				width: auto;
				text-align: center;
			}
			th{
				font-weight: bold;
			}
			.colored{
				color: white;
				background-color: gray;
			}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<th>first_name</th>
				<th>last_name</th>
				<th>company_name</th>
				<th>full_address</th>
				<th>phone1</th>
				<th>phone2</th>
				<th>email_address</th>
				<th>website</th>
			</tr>
<?php 
				ini_set('auto_detect_line_endings',TRUE);
				$start_row = 0;
				$skip = true;
				if (($csv_file = fopen("us-500.csv", "r")) !== FALSE) {
					while (($data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
						//This will skip the first row of the excell file
						if ($skip){
							$skip = false;
							continue; 
						}
						$start_row++;
						//set colored row every 10th
						if ($start_row%10===0){
?>			<tr class="colored">
<?php 					}else{
?>			<tr>
<?php					}
?>				<td><?= $data[0] ?></td>
				<td><?= $data[1] ?></td>
				<td><?= $data[2] ?></td>
				<td><?= $data[3]. ', '.$data[4]. ','.$data[5] . ', '.$data[6] . '  '.$data[7]  ?></td>
				<td><?= $data[8] ?></td>
				<td><?= $data[9] ?></td>
				<td><?= $data[10] ?></td>
				<td><?= $data[11] ?></td>
			</tr>
<?php
					}
				fclose($csv_file);
				}
?>		</table>
	</body>
</html>








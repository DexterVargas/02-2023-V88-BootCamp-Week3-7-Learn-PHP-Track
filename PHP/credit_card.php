<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Credit Card</title>
		<style>
			table,th,td{
				border: 1px solid black;
				text-align: center;
				border-collapse: collapse;
			}
			.colored{
				background-color: gray;
			}
		</style>
	</head>
	<body>
<?php $users = array( 
	array('cardholder_name'=> "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
	array('cardholder_name'=> "John Supsupin",'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
	array('cardholder_name'=> "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
	array('cardholder_name'=> "Mark Guillen", 'cvc' => 345, 'acc_num' => '123 123 123 123') ,
	array('cardholder_name'=> "Michael Jordan", 'cvc' => 193, 'acc_num' => '1144 8521 9876 5432'),
	array('cardholder_name'=> "John Travolta",'cvc' => 779, 'acc_num' => '0001 7410 1500 1510'),
	array('cardholder_name'=> "KKB Bayad", 'cvc' => 527, 'acc_num' => '4568 456 1203 5214'),
	array('cardholder_name'=> "Mark Zacker", 'cvc' => 325, 'acc_num' => '123 1023 1023 123') ,
	array('cardholder_name'=> "Dont Supsupin",'cvc' => 759, 'acc_num' => '0701 1200 1500 1510')
	); 	
?>	  <table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Name in uppercase</th>
				<th>Account Num</th>
				<th>CVC Num</th>
				<th>Full account</th> 
				<th>Length of full account</th>
				<th>Is valid</th>
			</tr>
<?php	for ($row=0; $row < count($users); $row++) { 
				if (($row+1)%3===0){
?>			<tr class = "colored"> 
<?php			}else{ 
?>		  	<tr>
<?php			}
?>				<td> <?= $row+1 ?></td>
				<td> <?=$users[$row]['cardholder_name']?></td>
<?php			$upper = strtoupper($users[$row]['cardholder_name']);
?>				<td> <?= $upper ?></td>
				<td> <?= $users[$row]['acc_num'] ?></td>
				<td> <?= $users[$row]['cvc']?></td>
<?php			$full = $users[$row]['acc_num'] . $users[$row]['cvc'];
?>				<td> <?= $full?></td>
<?php			$count= strlen(str_replace(" ", "",$full));
?>				<td> <?= $count?></td>
<?php			$yes = ($count===19)? 'yes':'no';
?>				<td> <?= $yes?></td>
			</tr>
<?php	}
?>		</table>
	</body>
</html>

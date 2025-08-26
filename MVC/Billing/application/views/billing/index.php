<!DOCTYPE HTML>
<html>
    <head>
        <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
        <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script>
$(document).ready(function () {
    $( ".datepicker" ).datepicker();
        var options = {

	animationEnabled: true,
	title: {
		text: "Client Billing 2011<"
	},
	axisY: {
		title: "Estimate Cost"
	},
	axisX: {
		title: "Months"
	},
	data: [{
		type: "column",
		dataPoints: [     
<?php 
foreach($data as $key => $value){
?>                { label: "<?= $value['month_charged'];?>", y:<?= $value['total_revenue'];?>},
<?php }                
?>                    ]
	}]
        };
   $("#chart-container").CanvasJSChart(options);
});
    </script>
    	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    </head>
    <body>
        <div class="table-container">
        <h1 class="title">List of total charges per month</h1>
        <form action="<?= base_url('load_data');?>" method="post">
        
        <label><input type="text" class="datepicker" name="date_from"> to <input type="text" class="datepicker" name="date_to"></label>
        <input type="submit" value="Fetch Data">
        </form>
        <table>
            <tr>
				<th>Month</th>
				<th>Year</th>
				<th>Total Cost</th>
			</tr>
<?php foreach($data as $key => $value){
?>            <tr class="<?=($key%2===0)?'colored':'default'?>">
                <td><?= $value['month_charged'];?></td>
                <td><?= $value['year_charged'];?></td>
                <td><?= $value['total_revenue'];?></td>
            </tr>
<?php
      }	
?>		</table> 
        </div><!-- 
    --><div id="chart-container"></div>
    </body>
</html>
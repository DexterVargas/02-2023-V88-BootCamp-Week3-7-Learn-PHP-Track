<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SIMSIMI ChatBot</title>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css') ;?>">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
		<script>
			$(document).ready(function() {
				$('form').submit(function() {
					$.post($(this).attr('action'), $(this).serialize(), function(res) {
						var result = JSON.parse(res);
						//convert to multi dimentional array
						var tagsArr = Object.entries(result.tags)
						//loop the converted array display tp table converted[tags][0] = key / converted[tags][1] = value
						var html_string = '';
						for (var tag = 0; tag < tagsArr.length; tag++) {
						html_string += 	'<tr>' +
                                			'<td>'+tagsArr[tag][0]+'</td>'+
                                			'<td>'+tagsArr[tag][1]+'</td>'+
                            			'</tr>';
						}
						$('#tags').html(html_string);
						$('#http').text(result.all_html);
					});
					return false;
				});
			});
		</script>
	</head>
	<body>
		<form action="api/http_analyzer" method="post">
			<h1>URL to fetch by AJAX</h1>
			<input name="url" type="text">
			<input type="submit" value="Fetch">
		</form>
		<div  id="display">
		<div class="html-analyzer">
		<h2>HTML Tag Analyzer</h2>
			<table>
				<thead>
					<tr>
						<th>HTML Tags</th>
						<th>Number of appearance</th>
					</tr>
				</thead>
				<tbody id="tags">
				</tbody>
			</table>
		</div>
		<div class="http-response">
			<h2>HTTP Response:</h2>
			<textarea name="http" id="http"></textarea>			
		</div>
		</div>
	</body>
</html>
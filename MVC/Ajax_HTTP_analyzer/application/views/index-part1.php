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
					$.get($('#url').val(), function(res) {
						$('#http').text(res);
						var html_tags = ['<meta', '<div','<p','<a', '<img', '<ul', '<li', '<h1', '<h2', '<h3']; 
						console.log(html_tags[0]);
						var meta = 0, div = 0, p = 0, a = 0, img = 0, ul = 0, li = 0, h1 = 0, h2 = 0, h3 = 0;
						elements.forEach(element => {
							console.log(element);
							if (element.startsWith(html_tags[0])) {
								meta+=1;
							}else if(element.startsWith(html_tags[1])){
								div+=1;
							}else if(element.startsWith(html_tags[2])){
								p+=1;
							}else if(element.startsWith(html_tags[3])){
								a+=1;
							}else if(element.startsWith(html_tags[4])){
								img+=1;
							}else if(element.startsWith(html_tags[5])){
								ul+=1;
							}else if(element.startsWith(html_tags[6])){
								li+=1;
							}else if(element.startsWith(html_tags[7])){
								h1+=1;
							}else if(element.startsWith(html_tags[8])){
								h2+=1;
							}else if(element.startsWith(html_tags[9])){
								h3+=1;
							}
						});
						$('#meta').text(meta);
						$('#div').text(div);
						$('#p').text(p);
						$('#a').text(a);
						$('#img').text(img);
						$('#ul').text(ul);
						$('#li').text(li);
						$('#h1').text(h1);
						$('#h2').text(h2);
						$('#h3').text(h3);
					});
					return false;
				});
			});
		</script>
	</head>
	<body>
		<form action="" method="post">
			<h1>URL to fetch by AJAX</h1>
			<input name="url" type="text" id = "url">
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
					<tbody>
						<tr class="colored">
							<td>meta</td>
							<td id="meta">0</td>
						</tr>
						<tr class="default">
							<td>div</td>
							<td id="div">0</td>
						</tr>
						<tr class="colored">
							<td>p</td>
							<td id="p">0</td>
						</tr>
						<tr class="default">
							<td>a</td>
							<td id="a">0</td>
						</tr>
						<tr class="colored">
							<td>img</td>
							<td id="img">0</td>
						</tr>
						<tr class="default">
							<td>ul</td>
							<td id="ul">0</td>
						</tr>
						<tr class="colored">
							<td>li</td>
							<td id="li">0</td>
						</tr>
						<tr class="default">
							<td>h1</td>
							<td id="h1">0</td>
						</tr>
						<tr class="colored">
							<td>h2</td>
							<td id="h2">0</td>
						</tr>
						<tr class="default">
							<td>h3</td>
							<td id="h3">0</td>
						</tr>
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
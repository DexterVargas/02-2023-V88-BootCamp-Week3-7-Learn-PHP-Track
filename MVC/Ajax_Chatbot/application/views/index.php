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
				$(document).on('submit','form', function(){
					$.post($(this).attr('action'), $(this).serialize(), function(res) {
						//$('.messages').html(res);
						document.getElementById('messages').innerHTML += res;
						$.get('chats/request_simsimi', function(data) {
							//$('.messages').html(data);
							document.getElementById('messages').innerHTML += data;
						});
					});
					return false;
				});
            });
		</script>
	</head>
	<body>
		<div class="chat-box">
			<h1>V-day sana all</h1>
			<div id="messages">
			</div>
		</div>
		<form action="chats/chat_bot" method="post">
			<input id="my_chat" name="my_chat" type="text">
			<input type="submit" value="Send">
		</form>
	</body>
</html>
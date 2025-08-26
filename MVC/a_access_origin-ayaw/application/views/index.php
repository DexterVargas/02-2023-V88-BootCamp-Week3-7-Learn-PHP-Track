<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
		<title>Access Control Origin</title>
		<script>
			// $(document).ready(function() {
			// 	$('form').submit(function() {
			// 		var url = "https://www.freetogame.com/api/game?id=";
			// 		url += $('#user_input').val();
			// 		$.get(url, function(res) {
			// 			if(res.length !== 0) {
			// 				html_string = "<img src='" + res.screenshots[0].image + "'/>"; 
			// 			} else {
			// 				html_string = "Not Found";
			// 			}
			// 			$('#results').html(html_string);
			// 		}, 'json');
			// 		return false;
			// 	});
			// });

			$(document).ready(function() {
                $('form').submit(function() {
                    // load up any gif you want, this will be shown while user is waiting for response
                
                    $.post($('form').attr('action'), $(this).serialize(), function(res) {
							console.log('pumasok na sa post');
                        var html_string = "";
                        if(res.length !== 0) {
                            html_string = "<img src='" + res.screenshots[0].image + "'/>";
                        } else {
                            html_string = "Not Found";
                        }
                        $("#results").html(html_string);
                    },"json");
					console.log('bot');

                    return false;   // don't forget, without this, the page will refresh
                });
            });
		</script>
	</head>
	<body>
		<h1>Free Games</h1>
		<!-- <form action="#" method="post">
			<label for="user_input">Enter Game ID:</label>
			<input id="user_input" name="user_input" type="search">
			<input type="submit" value="search">
		</form> -->
		<form action='games/search' method="post">
			<label for="user_input">Enter Game ID:</label>
			<input id="user_input" name="user_input" type="search">
			<input type="submit" value="search">
		</form>
		<div id="results">

		</div>
	</body>
</html>
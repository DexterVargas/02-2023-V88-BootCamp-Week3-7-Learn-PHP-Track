<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<title>Document</title>
		<script>
			 $(document).ready(function() {
                $('form').submit(function() {
                    // load up any gif you want, this will be shown while user is waiting for response
					console.log('form submitted');
					console.log($(this).attr('action'));

                    $.post($(this).attr('action'), $(this).serialize(), function(res) {
						console.log(res);
						//return false; 

						
						console.log('ayaw pumasok sa post!!!!');

                        var html_string = "";
                        if(res.length !== 0) {
                            html_string = "<img src='" + res.screenshots[0].image + "'/>";
                        } else {
                            html_string = "Not Found";
                        }
                        $("#results").html(html_string);
                    },"json");
                
					return false;

                     // don't forget, without this, the page will refresh
                });
            });
		</script>
	</head>
	<body>
		<form action="games/search" method="post">
		<label for="user_input">Enter Game ID:</label>
		<input id="user_input" name="user_input" type="search">
		<input type="submit" value="search">
		</form>
		<div id="results"></div>
	</body>
</html>
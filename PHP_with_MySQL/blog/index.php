<?php 

session_start();
require_once('db_connection.php');
//echo "WELCOME ! {$_SESSION['username']}";
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>Main | The Blog Page</title>
	</head>
	<body>
		<div class="blog-main-container">
			<h1>BLOG</h1> 
<?php 		if (!isset($_SESSION['username'])) {
?>				<p class="welcome-user">Welcome Anonymous</p>
				<a href="login.php"> Login</a>
<?php			}else {
?>				<p class="welcome-user">Welcome <?= $_SESSION['username']; ?> </p>
				<a href="process.php"> Logout</a>
<?php			}
?>
		</p>
			<div class="line"></div>
			<h2>TITLE</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum veritatis ullam temporibus. Dolor tempora, voluptates cum molestiae quae iste cumque deserunt ea. Molestias, expedita nobis eius voluptatem voluptates voluptas enim.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, veritatis ab consectetur perferendis ut omnis porro commodi facilis rem, quas assumenda? Eaque a dolorum expedita, mollitia ducimus fugiat ut aliquid, quis minima dolores accusamus debitis repellendus unde dolore aspernatur! Dolor ratione quas dicta ipsum at ipsa voluptate cum magni debitis.</p>
			<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia, odit!</p>
			<h3>Leave a Review</h3>
			<form action="process.php" method="post" class="review">
				<p class="error"><?= (!isset($_SESSION['review-error']))? null: $_SESSION['review-error']; ?></p>
				<textarea name="review_context" placeholder="Write a review..."></textarea>
				<input type="hidden" name="action" value="review">
				<input type="submit" value="Post a review" class="post" <?= (!isset(($_SESSION['username'])))? 'disabled': ''; ?>>
			</form>
<?php	$query = "SELECT  reviews.id,reviews.user_id,CONCAT(users.first_name,' ',users.last_name) AS username, reviews.context, reviews.created_at FROM reviews JOIN users ON users.id = reviews.user_id ORDER BY created_at DESC;";
	$check = fetch_all($query);
	if (!empty($check)) {
		foreach($check as$key => $value){
			$date = date_create($value['created_at']);
?>			<div class="review-container">
				<h4 class="review-title"><?= $value['username'] .' '. date_format($date,'(F jS Y h:i A)') ?></h4>
				<p class="review-context"><?= $value['context'] ?></p>
					<?php		$querycomment = "SELECT  reviews.id, replies.user_id, CONCAT(users.first_name, ' ', users.last_name) AS username, replies.content, replies.created_at 
					FROM replies 
					LEFT JOIN users ON users.id = replies.user_id 
					INNER JOIN  reviews ON reviews.id = replies.review_id 
					WHERE replies.review_id = '{$value['id']}' 
					ORDER BY replies.created_at asc;";
			$checkcomment = fetch_all($querycomment);
			if (!empty($checkcomment)) {
?>				<div class="comment-container">
<?php				foreach($checkcomment as $key => $value){
					$date = date_create($value['created_at']);			
?>					<h4 class="comment-title"><?= $value['username'] .' '. date_format($date,'(F jS Y h:i A)') ?></h4>
					<p class="comment-context"><?= $value['content'] ?></p>					
<?php   			}  ?>
				</div>				
<?php  	}
?>				<form action="process.php" method="post" class="comment">
					<p class="error"><?= (!isset($_SESSION['comment-error']))? null: $_SESSION['comment-error']; ?></p>
					<textarea class="reply-textarea" name="comment_context" placeholder="Reply to review...."></textarea>
					<input type="hidden" name="action" value="comment">
					<input type="hidden" name="review_id" value = "<?= $value['id']?>">
					<input type="submit" value="Reply" class="reply" <?= (!isset(($_SESSION['username'])))? 'disabled': ''; ?>>
				</form>
			</div>
<?php
		}			
	}		?>
		</div>
	</body>
</html>
<?php 
unset($_SESSION['review-error']);
unset($_SESSION['comment-error']);
?>
<?php 
session_start();
require_once('db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>The Wall Demo</title>
	</head>
	<body>
		<div class="main-container">
			<div class="wall-container">
				<h1>Welcome to my wall</h1>
<?php 		if (!isset($_SESSION['username'])) {
?>				<p>Anonymous</p>
				<a href="login.php"> Login</a>
<?php			}else {
?>				<p><?= $_SESSION['username']; ?> </p>
				<a href="process.php"> Logout</a>
<?php			}
?>				<h2>Say something</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia eveniet delectus corrupti iusto quia quis quo fugit exercitationem et dicta cum dignissimos, fuga eaque repudiandae assumenda quam quisquam doloribus modi!</p>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ipsum recusandae provident optio illo in doloremque tempora, natus, sapiente ullam quaerat quis saepe quidem error. Eius sit esse sapiente consectetur.</p>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod aut neque expedita, vitae quae dolores quasi hic distinctio dolorem voluptatum beatae ipsam placeat nesciunt nihil sapiente repudiandae? Quibusdam, nobis ipsa?</p>
				<h3>Leave a comment!</h3>
				<p class="error"><?= (!isset($_SESSION['comment-error']))? null: $_SESSION['comment-error']; ?></p>
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="comment">
					<textarea class="comment-area" name="comment"></textarea>
					<input type="submit" value="Leave a comment" <?=(!isset($_SESSION['userid'])? 'disabled' : ''); ?>>
				</form>
			</div>
			<div class="all-comment-container">
<?php 		$query = "SELECT comments.*, users.first_name, users.last_name
				 FROM users
				 JOIN comments ON users.id = comments.user_id ORDER BY created_at desc;";
			$result = fetch_all($query);
			foreach ($result as $key => $value) {
				$date = date_create($value['created_at']);
?>				<h3>Comment from <?= $value['first_name']?> <?= $value['last_name']?> @ <?= date_format($date,'(F jS Y h:i A)'); ?></h3>
				<p><?= $value['content']?> </p>
				<div class="line"></div>
				<div class="reply-container">
<?php				$query_reply="SELECT replies.*, CONCAT(users.first_name,' ', users.last_name) as username
					FROM replies
					INNER JOIN comments ON comments.id = replies.comment_id
					INNER JOIN users ON users.id = comments.user_id WHERE comments.id = '{$value['id']}' 
					ORDER BY created_at asc;";
					$result_reply = fetch_all($query_reply);
					foreach ($result_reply as $reply) {
						$datereply = date_create($reply['created_at']);
?>					<h4>Reply from <?= $reply['username']?> @ <?= date_format($datereply,'(F jS Y h:i A)'); ?></h4>
					<p><?= $reply['content']?></p>
<?php
}			
?>					<p class="error"><?= (isset($_SESSION['reply-error'])&&$_SESSION['reply-error-id']==$value['id'])? $_SESSION['reply-error']:null; ?></p>
					<form action="process.php" method="post">
						<input type="hidden" name="action" value="reply">
						<input type="hidden" name="comment_id" value="<?= $value['id'];?>">
						<textarea class="reply-area" name="reply"></textarea>
						<input type="submit" value="Reply to comment" <?=(!isset($_SESSION['userid'])? 'disabled' : ''); ?> >
					</form>
				</div>
<?php		}
?>			</div>
		</div>
<?php 
	unset($_SESSION['comment-error']);
	unset($_SESSION['reply-error']);
	unset($_SESSION['reply-error-id']);
?>	</body>
</html>

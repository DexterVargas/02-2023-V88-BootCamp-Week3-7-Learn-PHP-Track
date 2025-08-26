<?php 


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bookmark</title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<h1>Add a Boomark</h1>
		<form action="" method="post">
			<label for="">Name:</label><input type="text" name="name" id="name">
			<label for="">URL:</label><input type="text" name="url" id="url">
			<label for="">Folder</label><!-- 
		 --><select name="folder" id="folder">
				<option value="Favorites">Favorites</option>
				<option value="Others">Others</option>
			</select>
			<input type="hidden" name="add" value="add">
			<input type="submit" value="Add">
		</form>
		<h1>Bookmarks</h1>
		<table>
			<tr>
				<th>Folder</th>
				<th>Name</th>
				<th>URL</th>
				<th>Action</th>
			</tr>
			<tr>
				<td>Favorites</td>
				<td>youp</td>
				<td>www.xx.com</td>
				<td><a href=""> delete</a></td>
			</tr>
		</table>
	</body>
</html>
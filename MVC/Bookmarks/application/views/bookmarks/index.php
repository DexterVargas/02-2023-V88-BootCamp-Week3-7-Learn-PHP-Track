<?php $this->load->view('bookmarks/partials/header')?>
		<h1>Add a Bookmark</h1>
		<label id="error"><?= validation_errors();?></label>
		<form action="add" method="post">
			<label for="name">Name:</label><input type="text" name="name" id="name" value="Fake Value">
			<label for="url">URL:</label><input type="text" name="url" id="url" value="www.fake.value">
			<label for="folder">Folder: </label><!-- 
		 --><select name="folder" id="folder">
				<option value="Favorites">Favorites</option>
				<option value="Others">Others</option>
			</select>
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
<?php foreach($data as $key => $value){
?>          <tr class="<?=($key%2===0)?'colored':'default'?>">
                <td><?= $value['folder']?></td>
				<td><?= $value['name']?></td>
				<td><?= $value['url']?></td>
				<td><a href="destroy/<?= $value['id']?>">delete</a></td>
            </tr>
<?php
  }	
?>		</table>
<?php $this->load->view('bookmarks/partials/footer')?>

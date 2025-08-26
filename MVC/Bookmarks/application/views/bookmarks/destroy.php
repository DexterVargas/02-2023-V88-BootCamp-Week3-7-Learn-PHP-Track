<?php $this->load->view('bookmarks/partials/header')?>
		<p>Are you sure you want to delete?</p>
        <p><?=$folder; ?>  /  <?=$name; ?> <a href="<?=$name; ?>">(<?=$url; ?>)</a></p>
		<form action="/../Bookmarks" method="post" class="destroy">
			<input class="btn-no destroy" type="submit" value="No">
		</form><!-- 
     --><form action="delete" method="post" class="destroy">
			<input type="hidden" name="id" value="<?=$id;?>">
			<input class="btn-yes destroy" type="submit" value="Yes, I want to delete">
		</form>
<?php $this->load->view('bookmarks/partials/footer')?>

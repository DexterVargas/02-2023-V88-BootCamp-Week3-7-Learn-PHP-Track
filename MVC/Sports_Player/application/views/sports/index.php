<?php $this->load->view('sports/partials/header')?>

		<div class="main-container">
			<div class="search-container">
			<?=form_open(base_url('search_player'));						
?>
					<label for="search">Search Users</label>
					<input type="text" name="name" id="search">
					<label><input type="checkbox" name="female" value="F" />Female</label>
					<label><input type="checkbox" name="male" value="M"/>Male</label>
					<label>Sports</label>
					<label><input type="checkbox" name="basketball" value="1" />Basketball</label>
					<label><input type="checkbox" name="volleyball" value="2" />Volleyball</label>
					<label><input type="checkbox" name="baseball" value="3" />Baseball</label>
					<label><input type="checkbox" name="soccer"  value="4" />Soccer</label>
					<label><input type="checkbox" name="football"  value="5"/>Football</label>
					<input type="submit" value="Search">
				</form>
			</div><!--
		--><div class="player-container">
				<h2>&#171;Player List&#187;</h2> 
<?php foreach($players as $key => $value){	
?>				<div class= "player-thumbnail-container">
					<img src="<?= base_url('/assets/img/'. $value['image_path'].'');?>" alt="players-thumbnails">
					<p class="player-name"><?= $value['name'].' '. $value['gender'];?></p>
				</div> 
<?php }
?>			</div>
<?php $this->load->view('sports/partials/footer')?>


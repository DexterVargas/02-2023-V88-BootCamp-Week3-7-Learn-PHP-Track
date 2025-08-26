<?php $this->load->view('partials/header');
foreach($data as $key => $value){
	if ($value['id']==$id) {
		$fname = $value['first_name'];
		$lname = $value['last_name'];
	}
}
?>		<a href="<?= base_url();?>" >Go back to Masterlist</a>
		<h1>Update student #<?= $id?></h1>
		<form action="<?= base_url('students/edit_process/'.$id) ?>" method="post">
			<label for="last_name">Last name:</label><input type="text" name="last_name" id="last_name" value="<?= $lname?>">
			<label for="first_name">First name:</label><input type="text" name="first_name" id="first_name" value="<?= $fname?>">
			<label for="course">Course: </label><!-- 
		 --><select name="course" id="course">
<?php		 foreach($courses as $val){
?>          <option value="<?= $val['id']?>"><?= $val['name']?></option>			
<?php }?>				
			</select>
			<label for="classification">Classification: </label><!-- 
		 --><select name="classification" id="classification">
				<option value="Regular">Regular</option>
				<option value="Trainee">Trainee</option>
			</select>
			<label>Gender:</label>
			<input type="radio" name="gender" value="Male" checked><span> Male</span>
			<input type="radio" name="gender" value="Female"><span>Female</span>
			<input type="submit" value="Save">
		</form>
		<form action="<?= base_url("students/delete_by_id/".$id) ?>" method="post">
		<input type="submit" value="Delete" class="delete">
		</form>
<?php $this->load->view('partials/footer')?>

<?php $this->load->view('partials/header');?>
		<h1>Insert new student</h1>
		<form action="<?= base_url('students/add_new_student/')?>" method="post">
			<label for="last_name">Last name:</label><input type="text" name="last_name" id="last_name" value="">
			<label for="first_name">First name:</label><input type="text" name="first_name" id="first_name" value="">
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
			<input type="submit" value="Add">
		</form>
		<h1>List of students</h1>
		<table>
			<tr>
				<th>ID</th>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Gender</th>
				<th>Course Token</th>
				<th>Date added</th>
				<th>Action</th>
			</tr>
<?php if(!empty($data)){
foreach($data as $key => $value){
?>          <tr class="<?=($key%2===0)?'colored':'default'?>">
                <td><?= $value['id']?></td>
				<td><?= $value['first_name']?></td>
				<td><?= $value['last_name']?></td>
				<td><?= $value['gender']?></td>			
				<td><?= $student_courses[$key]?></td>
				<td><?= $value['created_at']?></td>
				<td><a href="students/edit/<?= $value['id']?>">edit</a> | <a href="students/delete_by_id/<?= $value['id']?>">Remove</a></td>
            </tr>
<?php
  }	}
?>		</table>
<?php $this->load->view('partials/footer')?>

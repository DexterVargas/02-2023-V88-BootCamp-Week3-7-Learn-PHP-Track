<?php 
$languages = array('PHP', 'JS', 'Ruby');
?>
<!--_using for loop_ -->
<label>Choose Programming Language:
	<select>
<?php	//for loop
for ($i=0; $i < count($languages) ; $i++) { 
?>
	<option><?= $languages[$i]?> </option>
<?php
}
?>
	</select>
</label><br>
<!--_using foreach loop_ -->
<label>Choose Programming Language:
	<select>
<?php	//foreach loop
foreach ($languages as $value) {
?>
	<option><?= $value ?></option>
<?php
}
?>
	</select>
</label><br>
<!--_using foreach loop + push new values to languages array_ -->
<label>Choose Programming Language:
	<select>
<?php 
array_push($languages,'HTML', 'CSS');
foreach ($languages as $value) {
?>
	<option><?= $value ?></option>
<?php
}
?>
	</select>
</label>

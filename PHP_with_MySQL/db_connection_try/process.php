<?php
// process.php
// include connection page
require_once('db_connection.php');
// Add validations here to make sure information is correct
// if validations pass, we insert the records into the database
if (isset($_POST['insert']) && $_POST['insert']=='insert') {
    
$query = "INSERT INTO lessons(subject_id, topic, handout_url, created_at, updated_at)
VALUES('{$_POST['subjects']}','{$_POST['topic']}','{$_POST['handout_url']}', NOW(), NOW())";
   
if(run_mysql_query($query))
{
$_SESSION['message'] = "New lesson has been added!";
}
else
{
$_SESSION['message'] = "Failed to add new lesson "; 
}

}

header('Location: index.php');
?>
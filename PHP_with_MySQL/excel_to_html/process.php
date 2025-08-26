<?php 
session_start();
require_once('db_connection.php');
//post method
if (isset($_POST['action']) && $_POST['action'] =='upload') {
	upload_csv();
}elseif (isset($_POST['action']) && $_POST['action'] =='view-csv') {
	veiw_csv();
}else {
	session_destroy();
	header('Location: index.php');
}
function upload_csv(){
	if (empty($_FILES['csv_file']['name'])) {
		$_SESSION['upload-error']='Error: No file selected. Please Check.';
		header('Location: index.php');
		die();
	}else {
		$uploads_dir = 'csv_files/';
		$file_name = $_FILES['csv_file']['name'];
		$file_tmp = $_FILES['csv_file']['tmp_name'];
		$file_path = $uploads_dir.$file_name;
		move_uploaded_file($file_tmp,$file_path);
		$query_check = "SELECT * FROM files";
		$result_check = fetch_all($query_check);
		var_dump($result_check);
		foreach ($result_check as $value) {
			if($value['file_name']==$file_name && $value['file_path']==$file_path){
				$_SESSION['upload-error']='Error: File already exist';
				header('Location: index.php');
				die();
				break;
			}
		}
		$query="INSERT INTO files (file_name, file_path, created_at, updated_at) VALUES('{$file_name}','{$file_path}',NOW(),NOW())";
		run_mysql_query($query);
		 $_SESSION['upload-success']='File successfully upload.';
		header('Location: index.php');
		die();
	}	
}

function veiw_csv(){
	$_SESSION['current-csv-id'] = $_POST['csv_id'];
	$_SESSION['current-csv-path'] = $_POST['csv_path'];
	$_SESSION['current-csv-name'] = $_POST['title'];
	compute_all_csv();
	header('Location: record.php');
	die();
}
function compute_all_csv(){
	ini_set('auto_detect_line_endings', TRUE);	
	$path = $_SESSION['current-csv-path'];
	$page_limit = 50;
	if (($handle = fopen($path, "r")) !== FALSE) {
		$row = 1;
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$row++;
		}	
		fclose($handle);
	}
	$total_data_rows = $row;
	$total_pages = ceil($total_data_rows/$page_limit);
	$ranges = array();
		for ($i=1; $i <=$total_pages ; $i++) { 
			$ranges[$i]['start'] = (($i*$page_limit)-$page_limit)+1;
			$ranges[$i]['end'] =$i*$page_limit;
		}
	$_SESSION['total-pages'] = $total_pages ;
	$_SESSION['range-pages'] = $ranges;
}
?>
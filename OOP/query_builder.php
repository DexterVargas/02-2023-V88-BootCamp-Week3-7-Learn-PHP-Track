<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>QUERY BUILDER</title>
	</head>
<body>

<?php 
class Database{
	public $connection;
	public function __construct(){
		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASS', ''); 
		define('DB_NAME', 'lead_gen_business');
		
	}
	public function fetch_all($query){
	  	$data = array();
	  	$result = $this->connection->query($query);
	  	while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
	  	}
		//echo "been here";
		return $data;
	}
}

//CLASS QUERY_BUILDER-------------------------------
class Query_Builder extends Database{
	public $title;
	public $query_string;
	public function __construct(){
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}
	public function get(){
		$tab= $this->fetch_all($this->query_string);
/////////////////Display H1 TITLE
			echo "<h1> {$this->title} </h1>";	
/////////////////Display data as TABLE
		echo "<table>";
		$row = 0;
  		foreach ($tab as $value) {
		  	$counter = count($value);
		  	echo "<tr>";
	  		foreach ($value as $x => $val) {
		  		if ($row<$counter) {
			 		echo " <th> {$x} </th>";
			  		$row++;
		  		}
	  		}
	  	echo "</tr>";
	  	echo "<tr>";
	  		foreach ($value as $val) {
		  		echo " <td> {$val} </td>";
	  		}
	  	echo "</tr>";
  		}
		echo "</table>";
	}
}

//CLASS SITES-------------------------------
class Sites extends Query_Builder{
	public $count = "COUNT(*)";
	public function __construct(){
		parent::__construct();
		$this->title = 'Lead Report:';
	}
	public function select($select_column){
		$this->query_string = "SELECT $select_column[0], $select_column[1]  FROM sites ";
	}
	public function group_by($group_by){
		$this->query_string = $this->query_string. " GROUP BY $group_by ";
	}
	public function having($id, $operator, $num){
		$this->query_string = $this->query_string. " HAVING $id $operator $num ;";
	}
}

//CLASS CLIENTS-------------------------------
class Clients extends Query_Builder{
	public function __construct(){
		parent::__construct();
		$this->title = 'Client List:';
	}
	 public function where($arr){
			foreach ($arr as $key => $value) {
			}
		$this->query_string = "SELECT * FROM clients WHERE $key = '$value'";
		return $this;
	 }
}

$db = new Database();
//---CLIENT Instances
$sites = new Sites();
$sites->select(array("client_id", $sites->count));
$sites->group_by('client_id');
$sites->having($sites->count, ">", 5);
$sites->get(); //returns the resultset
//---Sites Instances
$clients = new Clients();
$clients->where(array("last_name" => "Owen"))->get();
?>
</body>
</html>

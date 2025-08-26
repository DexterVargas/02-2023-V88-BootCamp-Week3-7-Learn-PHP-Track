<?php
/*--------------------BEGINNING OF THE CONNECTION PROCESS------------------*/
//define constants for db_host, db_user, db_pass, and db_database
//adjust the values below to match your database settings
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); //may need to set DB_PASS as 'root'
define('DB_DATABASE', 'people'); //make sure to set your database
//connect to database host
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
//make sure connection is good or die
//var_dump($connection);
if ($connection->connect_errno) 
{
  die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
}
/*-----------------------END OF CONNECTION PROCESS------------------------*/
/*----------------------DATABASE QUERYING FUNCTIONS-----------------------*/
//SELECT - used when expecting single OR multiple results
//returns an array that contains one or more associative arrays


function fetch_all($query)
{
  $data = array();
  global $connection;
  $result = $connection->query($query);
  while($row = mysqli_fetch_assoc($result)) 
  {
    $data[] = $row;
  }
  return $data;
}
//SELECT - used when expecting a single result
//returns an associative array

function fetch_record($query)
{
  global $connection;
  $result = $connection->query($query);
  return mysqli_fetch_assoc($result);
}
//used to run INSERT/DELETE/UPDATE, queries that don't return a value
//returns a value, the id of the most recently inserted record in your database



//sample when inserting
// $password = md5($_POST['password']);
// $email = escape_this_string($_POST['email']);
// $username = escape_this_string($_POST['username']);
/*
$password = md5('passwoerd');
$email = escape_this_string('vargaskjaslkdh!@fake.taxi');
$username = escape_this_string('dexter vargaskjaslkdh!');

$query = "INSERT INTO users (username, email, password, created_at, updated_at) VALUES ('{$username}', '{$email}', '{$password}', NOW(), NOW())";

run_mysql_query($query);


//when user login
// When your user is trying to log in:

// $password = md5($_POST['password']);
//  $email = escape_this_string($_POST['email']);
//  $query = "SELECT * FROM users where users.password = '{$password}' AND users.email = '{$email}'";
//  //..etc etc

//trying SALT.
/*
The function called openssl_random_pseudo_bytes() returns a string of bytes equal to the parameter it's given. This string isn't a normal alphanumeric string, so we turn it into a string using the function bin2hex(), which will turn the value returned from the openssl() function into a normal alphanumeric string. This new random string will be our salt. The idea is to store this $salt during the registration process. Example:
*/
$password = escape_this_string('password');
$salt = bin2hex(openssl_random_pseudo_bytes(22));
$encrypted_password = md5($password . '' . $salt);
$email = escape_this_string('vargaskjaslkdh!@fake.taxi');
$username = escape_this_string('dexter vargaskjaslkdh!');

$query = "INSERT INTO users (username, email, password, created_at, updated_at) VALUES ('{$username}', '{$email}', '{$encrypted_password}', NOW(), NOW())";

run_mysql_query($query);



echo $encrypted_password;

function run_mysql_query($query)
{
  global $connection;
  $result = $connection->query($query);
  return $connection->insert_id;
}
//returns an escaped string. EG, the string "That's crazy!" will be returned as "That\'s crazy!"
//also helps secure your database against SQL injection

function escape_this_string($string)
{
  global $connection;
  return $connection->real_escape_string($string);
}
?>
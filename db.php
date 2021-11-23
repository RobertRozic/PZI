<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$db_host= "localhost";
$db_user = "root";
$db_password = "";
$db_name = "pzi_projekt";

$mysqli = new mysqli($db_host,$db_user,$db_password,$db_name);

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
} else {
  //echo "Uspjesno ste spojeni na bazu!\n";
  
  $sql = "SELECT * FROM users";
  
  $result = $mysqli->query($sql);
  
  if ($result) {
	  $row = $result->fetch_row();
	  //echo json_encode($row);
  }
}
?>

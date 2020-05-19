<?php

// database connection plug
$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "";         /* Password */
$dbname = "demo";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$con = mysqli_connect("localhost","root","","streaming");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
/**
while($config = mysqli_fetch_assoc($settings)) {



}
**/
// testing below, make sql & functions
/**
$sql = 'SELECT * FROM config';
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){

$site_config["title"] = $row["sitename"];
$site_config["site_email"] = $row["site_email"]
} else {
 die("Err, Are you lost?, fix ya website!")
}

**/
?>

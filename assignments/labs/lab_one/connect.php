<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

/* Code by w3schools.com
https://www.w3schools.com/php/php_mysql_create.asp
Sorry as I don't have the recording of the class to get back to I had no idea how to do step 4
If you don't like me taking code from internet please consider ignoring I did this step.
*/

?>

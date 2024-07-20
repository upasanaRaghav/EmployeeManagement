<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "employee_db";

//connection creation
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// Database connection parameters
$host = "localhost"; // Change this to your MySQL host
$username = "root"; // Change this to your MySQL username
$password = "root"; // Change this to your MySQL password
$database = "gcms"; // Change this to your MySQL database name
$port = 3310; // Change this to your MySQL port if necessary

// Create connection
$con = mysqli_connect($host, $username, $password, $database, $port);

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>

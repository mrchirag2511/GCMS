<?php
// Retrieve form data
$computer_name = $_POST['computer_name'];
$computer_type = $_POST['computer_type'];
$status = $_POST['status'];

// Database connection parameters
$host = 'localhost';
$user = 'root'; // Replace 'your_username' with your MySQL username
$pass = 'root'; // Replace 'your_password' with your MySQL password
$dbname = 'gcms'; // Replace 'your_database' with your MySQL database name

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname, 3310);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO computer (computer_name, computer_type, status) VALUES ('$computer_name', '$computer_type', '$status')";

// Execute SQL statement
if (mysqli_query($conn, $sql)) {
     // Execute JavaScript to show an alert box
     echo '<script>alert("Record inserted successfully");';
     // Redirect to customer.html after 1 second
     echo 'setTimeout(function() { window.location.href = "dashboard.html"; }, 1000);</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

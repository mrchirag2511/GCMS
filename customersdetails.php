<?php
// Retrieve form data
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$host = 'localhost';
$user = 'root'; // Provide your MySQL username
$pass =  'root';
$dbname = 'gcms';


// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname, 3310);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO customer (fullname, username, gender, email, phone) VALUES ('$fullname', '$username', '$gender', '$email', '$phone')";

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

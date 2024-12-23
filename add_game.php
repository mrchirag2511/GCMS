<!-- <?php
// Retrieve form data
$title = $_POST['title'];
$genre = $_POST['genre'];
$platform = $_POST['platform'];
$price_per_hour = $_POST['price_per_hour'];


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
$sql = "INSERT INTO games (title, genre, platform, price_per_hour) VALUES ('$title', '$genre', '$platform', '$price_per_hour')";

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
?> -->

<?php
// Include your database connection file
include 'db_connection.php';

if(isset($_POST['submit'])) {
    // Retrieve form data
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $platform = $_POST['platform'];
    $price_per_hour = $_POST['price_per_hour'];
    $computer_id = $_POST['computer_id'];
    
    // Insert data into the games table
    $query = "INSERT INTO games (title, genre, platform, price_per_hour, computer_id) VALUES ('$title', '$genre', '$platform', '$price_per_hour', '$computer_id')";
    $result = mysqli_query($con, $query);
    
    if($result) {
        echo "<script>alert('Game added successfully');</script>";
    } else {
        echo "<script>alert('Error adding game');</script>";
    }
}

// Close database connection
mysqli_close($con);
?>

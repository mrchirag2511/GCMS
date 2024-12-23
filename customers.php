<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Database connection parameters
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $dbname = 'gcms';

    // Create connection
    $conn = mysqli_connect($host, $user, $pass, $dbname, 3310);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to insert customer details into the database
    $sql = "INSERT INTO customer (fullname, username, gender, email, phone) VALUES ('$fullname', '$username', '$gender', '$email', '$phone')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='dashboard.html';</script>";
    } else {
        echo "<script>alert('Error: Record not inserted');</script>";
        echo "<script>window.location.href='dashboard.html';</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Customer</title>
<style>
   body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: rgba(255, 255, 255, 1);
            margin: 0;
            padding: 0;
            text-shadow: #000;
            background-image: url('https://www.theloadout.com/wp-content/sites/theloadout/2022/08/valorant-champions-tour-champions-2022-group-stage-schedule-1.jpg');
        }
    form {
        max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 10px rgb(175, 99, 0);
            opacity: 100%;
            color: #f7740c;
            margin-top: 10%;
            justify-content: center;
    }
    label {
            display:flow-root;
            color: #000;
            /* text-shadow: 4px 4px 4px rgba(184, 89, 0, 0.5); */
            opacity: 100%;
            margin-bottom: 12px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #ff9933;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #f7740c;
            color: #000;
        }
        

        input:invalid {
            border: 1px solid red;
        }

    .back-btn {
            margin-top: 55px;
            margin-bottom: 95px;
            display: inline-block;
            justify-content: center;
            align-self: center;
            padding: 10px 25px;
            font-size: 21px;
            text-transform: uppercase;
            text-decoration: none;
            background-color: #000;
            color: #ff9933;
            border: 15px solid transparent;
            border-radius: 7%;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
        }

        .back-btn:hover {
            background-color: #f7740c;
            /* Darker shade of orange on hover */
            color: #000;
            // border-color: #000; /* White border color on hover */
            transform: translateY(-9px);
        }

        .center-container {
            text-align: center;
            /* Center the button inside the container */
        }

        header {
            /* background-color: #000;
            /* Black background color */
            color: #f7740c;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #000;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 7%;
           
        }

        h2 {
            
            justify-content:center;
            font-size: 35px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 0px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

</style>
</head>
<body>
<header>
        <h2>Add New Customer Details</h2>
    </header>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required>

    <input type="submit" value="Add Customer">
</form>
<div class="center-container">
        <button class="back-btn" onclick="goBack()">Back</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <footer>
        <p>&copy; 2024 Gaming Cafe Management System</p>
        <p>Made with &#10084; by Chirag Pandit, Vishwajeet Biradar, Sumit Khandelwal & Sujal Kumar</p>
    </footer>

</body>
</html>

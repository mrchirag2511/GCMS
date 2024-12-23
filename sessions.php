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

// Function to sanitize input data
function sanitize_input($data) {
    global $con;
    return mysqli_real_escape_string($con, $data);
}

// Fetch customer IDs from the database
$customer_query = mysqli_query($con, "SELECT customer_id FROM customer");
$customers = [];
while ($row = mysqli_fetch_assoc($customer_query)) {
    $customers[] = $row['customer_id'];
}

// Fetch computer IDs from the database
$computer_query = mysqli_query($con, "SELECT computer_id FROM computer");
$computers = [];
while ($row = mysqli_fetch_assoc($computer_query)) {
    $computers[] = $row['computer_id'];
}

// Add session if form is submitted
if (isset($_POST['submit'])) {
    $start_time = sanitize_input($_POST['start_time']);
    $end_time = sanitize_input($_POST['end_time']);
    $amount_paid = sanitize_input($_POST['amount_paid']);
    $status = sanitize_input($_POST['status']);
    $customer_id = sanitize_input($_POST['customer_id']);
    $computer_id = sanitize_input($_POST['computer_id']);
    
    $query = mysqli_query($con, "INSERT INTO session (customer_id, computer_id, start_time, end_time, amount_paid, status) VALUES ('$customer_id', '$computer_id', '$start_time', '$end_time', '$amount_paid', '$status')");
    if ($query) {
        echo "<>alert('Session added successfully');</script>";
        echo "<script>window.location.href='dashboard.html';</script>";
    } else {
        echo "<script>alert('Error adding session');</script>";
        echo "<script>window.location.href='dashboard.html';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Session</title>
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
        color: #000;
        margin-top: 10%;
    }
    label {
        display: block;
        margin-bottom: 10px;
        color: #000;
    }
    input[type="text"],
    input[type="datetime-local"],
    input[type="number"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
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
    h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .back-btn {
            margin-top: 75px;
            display: inline-block;
            justify-content: center;
            align-self: center;
            padding: 10px 25px;
            margin: 30px;
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
            margin-bottom: 8%;

        }

        h2 {

            justify-content: center;
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
        .back-btn {
            margin-top: 75px;
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
</style>
</head>
<body>
<header>
        <h2>Add New Session Details</h2>
    </header>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   
    
    <!-- Customer ID -->
    <label for="customer_id">Customer ID:</label>
    <select id="customer_id" name="customer_id" required>
        <?php foreach ($customers as $customer_id): ?>
            <option value="<?php echo $customer_id; ?>"><?php echo $customer_id; ?></option>
        <?php endforeach; ?>
    </select>
    
    <!-- Computer ID -->
    <label for="computer_id">Computer ID:</label>
    <select id="computer_id" name="computer_id" required>
        <?php foreach ($computers as $computer_id): ?>
            <option value="<?php echo $computer_id; ?>"><?php echo $computer_id; ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="start_time">Start Time:</label>
    <input type="datetime-local" id="start_time" name="start_time" required>

    <label for="end_time">End Time:</label>
    <input type="datetime-local" id="end_time" name="end_time" required>

    <label for="amount_paid">Amount Paid:</label>
    <input type="number" id="amount_paid" name="amount_paid" required>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required>

    <input type="submit" name="submit" value="Add Session">
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

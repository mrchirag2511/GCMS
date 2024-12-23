<?php
// Include database connection file
include 'db_connection.php';

// Fetch customer IDs from the database
$customer_query = mysqli_query($con, "SELECT customer_id FROM customer");
$customers = [];
while ($row = mysqli_fetch_assoc($customer_query)) {
    $customers[] = $row['customer_id'];
}

// Fetch game IDs from the database
$game_query = mysqli_query($con, "SELECT game_id FROM games");
$games = [];
while ($row = mysqli_fetch_assoc($game_query)) {
    $games[] = $row['game_id'];
}

// Fetch session IDs from the database
$session_query = mysqli_query($con, "SELECT session_id FROM session");
$sessions = [];
while ($row = mysqli_fetch_assoc($session_query)) {
    $sessions[] = $row['session_id'];
}

// Add transaction if form is submitted
if (isset($_POST['submit'])) {
    $customer_id = $_POST['customer_id'];
    $game_id = $_POST['game_id'];
    $session_id = $_POST['session_id'];
    $quantity = $_POST['quantity'];
    $total_amount = $_POST['total_amount'];
    $transaction_date = $_POST['transaction_date'];
    
    $query = mysqli_query($con, "INSERT INTO transactions (customer_id, game_id, session_id, quantity, total_amount, transaction_date) VALUES ('$customer_id', '$game_id', '$session_id', '$quantity', '$total_amount', '$transaction_date')");
    if ($query) {
        echo "<>alert('Transaction added successfully');</script>";
        echo "<script>window.location.href='dashboard.html';</script>";
    } else {
        echo "<script>alert('Error adding transaction');</script>";
        echo "<script>window.location.href='dashboard.html';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Transaction</title>
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
    input[type="number"],
    input[type="date"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
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
        <h2>Add New Transaction Details</h2>
    </header>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  
    
    <!-- Customer ID -->
    <label for="customer_id">Customer ID:</label>
    <select id="customer_id" name="customer_id" required>
        <?php foreach ($customers as $customer_id): ?>
            <option value="<?php echo $customer_id; ?>"><?php echo $customer_id; ?></option>
        <?php endforeach; ?>
    </select>
    
    <!-- Game ID -->
    <label for="game_id">Game ID:</label>
    <select id="game_id" name="game_id" required>
        <?php foreach ($games as $game_id): ?>
            <option value="<?php echo $game_id; ?>"><?php echo $game_id; ?></option>
        <?php endforeach; ?>
    </select>
    
    <!-- Session ID -->
    <label for="session_id">Session ID:</label>
    <select id="session_id" name="session_id" required>
        <?php foreach ($sessions as $session_id): ?>
            <option value="<?php echo $session_id; ?>"><?php echo $session_id; ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>
    
    <label for="total_amount">Total Amount:</label>
    <input type="number" id="total_amount" name="total_amount" step="0.01" required>
    
    <label for="transaction_date">Transaction Date:</label>
    <input type="date" id="transaction_date" name="transaction_date" required>
    
    <input type="submit" name="submit" value="Add Transaction">
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

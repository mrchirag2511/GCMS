<!-- <?php
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

        // Fetch customers from the database
        $sql = "SELECT * FROM customer";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["customer_id"] . "</td>";
                echo "<td>" . $row["fullname"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>";
                echo "<button class='edit-btn'>Edit</button>";
                echo "<button class='delete-btn'>Delete</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }

        // Close the database connection
        mysqli_close($conn);
        ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        table {
            width: 100%;
            /* border-collapse: collapse; */
            align-content: center;
            margin-top: 9%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
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
           
        }

        h2 {
            
            justify-content:center;
            font-size: 35px;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 0;
        }
    </style>
</head>

<body>

    <header>
        <h2>Customer List</h2>
    </header>




    <table id="customer-table">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
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

            // Fetch customers from the database
            $sql = "SELECT * FROM customer";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["customer_id"] . "</td>";
                    echo "<td>" . $row["fullname"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No customers found</td></tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

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
<!-- <?php
// Define the correct username and password
$correctUsername = "admin";
$correctPassword = "admin";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve submitted credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if submitted credentials match correct username and password
    if ($username === $correctUsername && $password === $correctPassword) {
        // Authentication successful
        echo "Login successful. Welcome, $username!";
    } 
    else {
        // Authentication failed
        echo "Login failed. Invalid username or password.";
    }
}
?> -->

<!-- <?php
// Define the correct username and password
$correctUsername = "admin";
$correctPassword = "admin";

// Initialize error variable
$error = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve submitted credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if submitted credentials match correct username and password
    if ($username === $correctUsername && $password === $correctPassword) {
        // Authentication successful
        // Redirect to dashboard or another page
        header("Location: dashboard.html");
        exit(); // Stop further execution
    } else {
        // Authentication failed
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        // Function to display alert box
        function showAlert(message) {
            alert(message);
        }
        // Check if error message is set and display alert box
        <?php if (!empty($error)) { ?>
            window.onload = function() {
                showAlert("<?php echo $error; ?>");
                // Redirect to dashboard or another page
        header("Location: login.html");
        exit();
            };
        <?php } ?>
    </script>
</head> -->

<?php
// Define the correct username and password
$correctUsername = "admin";
$correctPassword = "admin";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve submitted credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if submitted credentials match correct username and password
    if ($username === $correctUsername && $password === $correctPassword) {
        // Authentication successful
        // Redirect to dashboard
        header("Location: dashboard.html");
        exit(); // Stop further execution
    } else {
        // Authentication failed
        // Redirect to login page with error message
        header("Location: login.html?error=1");
        exit(); // Stop further execution
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        window.onload = function() {
            // Check if there is an error parameter in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            
            if (error) {
                // Display alert box
                alert("Invalid username or password.");
            }
        };
    </script>
</head>
<body>
    <!-- Your login form goes here -->
</body>
</html>





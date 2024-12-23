<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <?php
  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded admin credentials
    $adminUsername = "admin";
    $adminPassword = "admin";

    // Retrieve submitted credentials
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if credentials match admin
    if ($username === $adminUsername && $password === $adminPassword) {
      echo "<h2>Login successful</h2>";
      // Redirect to admin dashboard or perform other actions
    } else {
      echo "<h2>Login failed. Invalid credentials.</h2>";
    }
  }
  ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
  </form>
</body>
</html>

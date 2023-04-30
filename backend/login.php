#!/usr/local/bin/php
<?php
// Replace the following with your database connection details
require_once 'config.php';

$email = $_POST["email"];
$pass = $_POST["password"];

// Hash the password
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO User (Email, Password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed_password);

// Execute the statement
try {
    if ($stmt->execute()) { ?>
        <div class="container">
            <h1>Success!</h1>
            <p>New user created successfully.</p>
            <a href="/index.php">Go back to Homepage</a>
        </div>
    <?php } else { ?>
        <div class="container">
            <h1><?php echo "Error: The email " . $email . " already exists" ?></h1>
            <a href="../index.php">Go back to Homepage</a>
        </div>
    <?php }
}
catch (Exception $e) { ?>
    <div class="container">
        <h1><?php echo "Error: The email " . $email . " already exists" ?></h1>
        <a href="../index.php">Go back to Homepage</a>
    </div>
<?php }

// Close the connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 20px;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            color: #007BFF;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #333;
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
</body>
</html>

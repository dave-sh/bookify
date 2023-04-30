<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    
</head>
<body>

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
            <h1><?php echo "Error: " . $stmt->error; ?></h1>
            <a href="/index.php">Go back to Homepage</a>
        </div>
    <?php }
}
catch (Exception $e) { ?>
    <div class="container">
        <h1><?php echo "Error: The email " . $email . " already exists" ?></h1>
        <a href="/index.php">Go back to Homepage</a>
    </div>
<?php }

// Close the connection
$stmt->close();
$conn->close();
?>

</body>
</html>

#!/usr/local/bin/php
<?php
	// Replace the following with your database connection details
	require_once 'config.php';
	session_start();
	$email = $_POST["email"];
	$pass = $_POST["password"];

	// Hash the password
	$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

	// Prepare and bind the SQL statement
	$stmt = $conn->prepare("INSERT INTO User (Email, Password) VALUES (?, ?)");
	$stmt->bind_param("ss", $email, $hashed_password);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DaisyUI CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css">
    <title>Sign Up Page</title>
</head>
<body>
	<div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
		<div class="p-4 mt-24 w-4/5 sm:w-2/3 md:w-1/2 m-auto lg:w-1/3 bg-white rounded-xl shadow-md text-center">
			<?php try {
				// Execute the statement
				if ($stmt->execute()) {
					$username = mysqli_real_escape_string($conn, $_POST['email']);
					$password = $_POST['password']; // Don't escape or hash this here

					$sql =  "SELECT UserID, Password FROM User WHERE Email = ?";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$result = $stmt->get_result();
					$user = $result->fetch_assoc();

					if ($user && password_verify($password, $user['Password'])) {
						// Password is correct
						$_SESSION['login_user'] = $username;
						$_SESSION['isLoggedIn'] = true;
						header("location: ../components/vacations.php");
					}
					exit;
				?>
				<?php } else { ?>
					<h1 class="text-xl font-bold"><?php echo "The email " . $email . " already exists" ?></h1>
					<a class="font-bold text-primary hover:underline" href="../index.php">Go back to Homepage</a><br>
					<a class="font-bold text-primary hover:underline" href="../backend/login.php">Returning User? Log In Here</a>
				<?php }
			}
			catch (Exception $e) { ?>
				<h1 class="text-xl font-bold"><?php echo "The email " . $email . " already exists" ?></h1>
				<a class="font-bold text-primary hover:underline" href="../index.php">Go back to Homepage</a><br>
				<a class="font-bold text-primary hover:underline" href="../backend/login.php">Returning User? Log In Here</a>
			<?php }

			// Close the connection
			$stmt->close();
			$conn->close();
			?>
		</div>
	</div>
</body>
</html>






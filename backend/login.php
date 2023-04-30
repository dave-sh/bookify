<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DaisyUI CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Login</title>
</head>
<body class="p-4">

<div data-theme="cupcake" class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
    <div class="p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Login</h2>
        <?php
        require_once('config.php');
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // prevent XSS injections
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
                header("location: ../index.php");
            } else {
                // Password is incorrect
                echo "<div class='text-red-500 mt-4'>Your Username or Password is invalid</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email:
                </label>
                <input class="border rounded-lg py-2 px-3 text-gray-700 w-full" type="email" id="email" name="email" required>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password:
                </label>
                <input class="border rounded-lg py-2 px-3 text-gray-700 w-full" type="password" id="password" name="password" required>
            </div>
            <div class="mt-8">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>

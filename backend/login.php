#!/usr/local/bin/php
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
<body>

<div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
    <div class="p-4 mt-8 w-4/5 sm:w-2/3 md:w-1/2 m-auto lg:w-1/3 bg-white rounded-xl shadow-md">
        <div class="flex flex-row">
    		<button class="mr-2 btn-sm btn btn-square btn-primary" onClick="location.href='../index.php'">
  			<svg class="w-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          		<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        	</svg>
        	</button>
        <h2 class="text-2xl font-semibold text-gray-700 mb-1">Login</h2>
        </div>
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
                $_SESSION['isLoggedIn'] = true;
                header("location: ../components/vacations.php");
            } else {
                // Password is incorrect
                echo "<div class='text-red-500 mt-4'>Your Username or Password is invalid</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="mt-4">
                <label class="block text-gray-700 text font-bold mb-2" for="email">
                    Email:
                </label>
                <input class="border rounded-lg py-2 px-3 text-gray-700 w-full" type="email" id="email" name="email" required>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 text font-bold mb-2" for="password">
                    Password:
                </label>
                <input class="border rounded-lg py-2 px-3 text-gray-700 w-full" type="password" id="password" name="password" required>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="hover:underline text-primary text-lg font-bold">
                    Login
                </button>
            </div>
        </form>
        <div class="text-center text-lg text-gray-700 font-bold">
        Don't have an account?
        <button onclick="location.href='signup.html'" class="hover:underline text-primary text-lg font-bold">
            Register here
    	</button>
    	</div>
    </div>
</div>

</body>
</html>


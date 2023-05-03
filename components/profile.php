#!/usr/local/bin/php
<?php
session_start();
$old_password_err = "";
$new_password_err = "";
$confirm_password_err = "";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["email"])) {
    header("location: ../backend/login.php");
    exit;
}

require_once '../backend/config.php';

$old_password = $new_password = $confirm_password = "";
$old_password_err = $new_password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["old_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])) {
    if (empty(trim($_POST["old_password"]))) {
        $old_password_err = "Please enter your old password.";
    } else {
        $old_password = trim($_POST["old_password"]);
    }

    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter your new password.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm your new password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Passwords did not match.";
        }
    }

    if (empty($old_password_err) && empty($new_password_err) && empty($confirm_password_err)) {
        $sql = "SELECT Password FROM User WHERE Email = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $_SESSION["email"];
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($old_password, $hashed_password)) {
                            $sql = "UPDATE User SET Password = ? WHERE Email = ?";
                            if ($update_stmt = $conn->prepare($sql)) {
                                $update_stmt->bind_param("ss", $param_new_password, $param_email);
                                $param_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                                $param_email = $_SESSION["email"];
                                if ($update_stmt->execute()) {
                                    header("location: ../components/vacations.php");
                                    exit;
                                } else {
                                    echo "Failed.";
                                }
                                $update_stmt->close();
                            }
                        } else {
                            $old_password_err = "Password is incorrect.";
                        }
                    }
                }
            } else {
                echo "Failed.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DaisyUI CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Profile Page</title>
</head>
<body>
    <div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
        <div class="p-4 mt-8 w-4/5 sm:w-2/3 md:w-1/2 m-auto lg:w-1/3 bg-white rounded-xl shadow-md">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Change Password</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mt-4">
                    <label class="block text-gray-700 text font-bold mb-2">Old Password:</label>
                    <input class="border rounded-lg py-2 px-3 text-gray-700 w-full" type="password" name="old_password">
                    <span class="error"><?php echo $old_password_err; ?></span>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700 text font-bold mb-2">New Password:</label>
                    <input class="border rounded-lg py-2 px-3 text-gray-700 w-full" type="password" name="new_password">
                    <span class="error"><?php echo $new_password_err; ?></span>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700 text font-bold mb-2">Confirm New Password:</label>
                    <input class="border rounded-lg py-2 px-3 text-gray-700 w-full" type="password" name="confirm_password">
                    <span class="error"><?php echo $confirm_password_err; ?></span>
                </div>

                <div class="mt-4 text-center">
                <button type="submit" class="hover:underline text-primary text-lg font-bold">Submit</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <a class="font-bold text-primary hover:underline" href="../components/vacations.php">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>
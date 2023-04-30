<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>

</head>
<body>

<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // prevent XSS injections
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT)



  $sql =  "SELECT id FROM admin WHERE username = '$username' and passcode = '$hashed_password'";
  $result = mysqli_query($dbname, $sql)
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC)
  $active = $row['active'];

  $count = mysqli_num_rows($result)
  if($count == 1) {
      $_SESSION['login_user'] = $username;

      header("location: welcome.php");
  }else {
      $error = "Your Username or Password is invalid";
  }

}





?>
<?php 

include("config.php");
session_start();

if($_servername["REQUEST_METHOD"] == "POST") {

    // prevent XSS injections
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT)



  $sql =  "SELECT id FROM admin WHERE username = '$username' and passcode = '$hashed_password'";
  $result = mysqli_query($dbname, $sql)
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC)
  $active = $row['active'];

  $count = mysqli_num_rows($result)
  if($count == 1) {
    session_register("myusername");
    $_SESSION['login_user'] = $username;
    
    header("location: welcome.php");
   }else {
    $error = "Your Username or Password is invalid";
   }

}
         




?>
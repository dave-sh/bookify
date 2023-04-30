<<<<<<< HEAD
<?php 
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>

</head>
<body>

<?php
>>>>>>> 018a676aab32ef4ac3b3ffb130b8b17768078846

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
<<<<<<< HEAD
    session_register("myusername");
    $_SESSION['login_user'] = $username;
    
    header("location: welcome.php");
   }else {
    $error = "Your Username or Password is invalid";
   }

}
         
=======
      session_register("myusername");
      $_SESSION['login_user'] = $username;

      header("location: welcome.php");
  }else {
      $error = "Your Username or Password is invalid";
  }

}

>>>>>>> 018a676aab32ef4ac3b3ffb130b8b17768078846




?>
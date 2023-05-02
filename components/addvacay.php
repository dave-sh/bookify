#!/usr/local/bin/php
<?php
	require_once('../backend/config.php');
	// Initialize the session
	session_start();
 	
	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
		header("location: newuser.php");
		exit;
	}
	$email = $_SESSION['login_user'];
	$place = htmlspecialchars($_GET['place']);
	$name = htmlspecialchars($_GET['name']);
	$_SESSION['place'] = $place;
	
	$sql = "INSERT INTO vacations (userID) SELECT UserID FROM User WHERE Email = '$email'";
	$result = $conn->query($sql);
	$sql = "UPDATE vacations SET place = '$place', name = '$name' WHERE vacationID=(SELECT LAST_INSERT_ID())";
	$result = $conn->query($sql);
	$sql = "SELECT vacationID FROM vacations WHERE vacationID=(SELECT LAST_INSERT_ID())";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	$vacationid = $row["vacationID"];
	$_SESSION['vacationid'] = $vacationid;
	$conn->close();

	header("location: vacation.php");
	exit;
?>
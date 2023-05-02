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
	$locationid = htmlspecialchars($_GET['locationid']);
	$vacationid = $_SESSION['vacationid'];
	
	$sql = "INSERT INTO activities (locationid, vacationid) VALUES ('$locationid', '$vacationid')";
	$result = $conn->query($sql);
	$conn->close();

	header("location: ../components/activities.php");
	exit;
?>
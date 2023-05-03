#!/usr/local/bin/php
<?php
	require_once('../backend/config.php');
	// Initialize the session
	session_start();
 	
	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
		header("location: login.php");
		exit;
	}

	$activityid = htmlspecialchars($_GET['activityid']);

	$sql = "DELETE FROM activities WHERE activityid = $activityid";
	$result = $conn->query($sql);
	
	$conn->close();

	header('Location: ../components/vacation.php');
?>
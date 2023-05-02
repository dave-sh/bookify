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

    var_dump($_GET);
	$activityid = htmlspecialchars($_GET['activityid']);


	$sql = "DELETE FROM activities WHERE activityid = $activityid";
	$result = $conn->query($sql);
	
	//close access to mysql
	$conn->close();

	header('Location: ../components/vacation.php');

?>
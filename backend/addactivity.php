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
	$locationid = htmlspecialchars($_GET['locationid']);
	$vacationid = $_SESSION['vacationid'];
	
	$sql = "SELECT * FROM activities WHERE locationid = $locationid AND vacationid = '$vacationid'";
	$result = $conn->query($sql);
	if ($result) {
	  if ($result->num_rows > 0) {
		$conn->close();
	  } else {
		$sql = "INSERT INTO activities (locationid, vacationid) VALUES ('$locationid', '$vacationid')";
		$result = $conn->query($sql);
		$conn->close();
	  }
	} else {
	  echo 'Error: ' . mysql_error();
	}
	
	header("location: ../components/activities.php");
	exit;
?>
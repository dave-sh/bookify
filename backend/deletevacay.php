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

	$vacationid = htmlspecialchars($_GET['vacationId']);

	$sql = "DELETE FROM vacations WHERE vacationID = $vacationid";
	$result = $conn->query($sql);
	
	//close access to mysql
	$conn->close();

	header('Location: ../components/vacations.php');
?>
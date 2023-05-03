#!/usr/local/bin/php
<?php
	session_start();
	unset($_SESSION['login_user']);
	unset($_SESSION['isLoggedIn']);
	session_destroy();
	header("location: ../index.php");
	exit;
?>

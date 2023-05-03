#!/usr/local/bin/php
<?php
	
	require_once('../backend/config.php');
	session_start();
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
		header("location: ../backend/login.php");
		exit;
	}
	
	$sort = $_GET["sort"];
	$place = $_SESSION['place'];
	$sql = "SELECT LocationID, Title, Review_points, Main_image, Description, Price_Range FROM locations WHERE LOWER(locations.City) LIKE '%$place%' ORDER BY LocationID";
	$result = $conn->query($sql);
	if ($sort === "none") {
		$sql = "SELECT LocationID, Title, Review_points, Main_image, Description, Price_Range FROM locations WHERE LOWER(locations.City) LIKE '%$place%' ORDER BY LocationID";
		$result = $conn->query($sql);
	}
	else if ($sort === "rating") {
		$sql = "SELECT LocationID, Title, Review_points, Main_image, Description, Price_Range FROM locations WHERE LOWER(locations.City) LIKE '%$place%' ORDER BY Review_points DESC";
		$result = $conn->query($sql);
	}

	if ($result->num_rows > 0) {
		// Output data of each row
		while ($row = $result->fetch_assoc()) {
			$locationid = $row['LocationID'];
			echo "<div class='hover:bg-white rounded-lg shadow-md p-4 mb-4 h-fit'>";
			echo "<h2 class='text-lg text-primary italic font-bold mb-2'>" . $row['Title'] . "</h2>";
			echo "<img src='" . $row['Main_image'] . "' alt='Product Image' class='h-44 mb-4 object-cover overflow-hidden'>";
			echo "<p class='text-base mb-4'>" . $row['Description'] . "</p>";
			echo "<div class='flex justify-between items-center mb-4'>";
			echo "<div>";
			echo "<h3 class='text-lg font-bold text-primary mb-2'>Price Range</h3>";
			echo "<p class='text-base font-bold text-primary'>" . $row['Price_Range'] . "</p>";
			echo "</div>";
			echo "<div>";
			echo "<h3 class='text-lg font-bold text-primary mb-2'>Rating</h3>";
			echo "<p class='text-base font-bold text-primary'>" . $row['Review_points'] . "</p>";
			echo "</div>";
			echo "</div>";
			echo "<button class='bg-primary hover:bg-primary-focus text-white font-bold py-2 px-4 rounded-lg' name='locationid' value='$locationid' onClick='add()'>Add</button>";
			echo "</div>";
		}
	} else {
		echo "No activities found";
	}
	$conn->close();
?>
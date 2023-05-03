#!/usr/local/bin/php
<?php
	// Initialize the session
	session_start();
 	require_once('../backend/config.php');
	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
		header("location: ../index.php");
		exit;
	}
	$vacationid = htmlspecialchars($_GET['vacationId'] ?? '');
	if (empty($vacationid) ) {
		$vacationid = $_SESSION['vacationid'];
	}
	$_SESSION['vacationid'] = $vacationid;
	$sql = "SELECT name, place FROM vacations WHERE vacationID = '$vacationid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row) {
		$name = $row['name'];
		$place = $row['place'];
		$_SESSION['place'] = $place;
		$_SESSION['name'] = $name;
	}
	$sql = "SELECT activities.activityid, Title, Review_points, Main_image, Description, Price_Range FROM locations INNER JOIN activities ON activities.locationid = locations.LocationID WHERE activities.vacationid = '$vacationid'";

	$result = $conn->query($sql);
?>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Bookify</title>
  </head>
  <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
		function remove() {
			document.actForm.action = "../backend/deleteactivity.php";
			document.actForm.submit();
		}
    </script>
<body>
	<?php
	include 'navbar_logged_in.php';
	?>
	<div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
		<div class="card w-full md:w-3/4 md:mt-12 lg:w-2/3 mb-4 mx-auto bg-base-100 md:shadow-lg overflow-auto">
			<div class="card-body">
				<div class="card-title">
					<button class="mt-1 btn-sm btn btn-square btn-primary" onClick="location.href='vacations.php'">
						<svg class="w-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
						</svg>
					</button>
					<p class="text-5xl"><?php 
						echo $_SESSION['name'];
					?></p>
					<ul class="menu menu-horizontal bg-base-100 rounded-box">
						<li><a class="hover:bg-base-100 underline">Location Info</a></li>
						<li><a class="hover:bg-base-100 hover:underline" onclick="location.href='activities.php'">Activities</a></li>
					</ul>
				</div>
				<p class="text-3xl italic"><?php 
					echo $_SESSION['place'];
				?></p>
				<div>
					<img src="../images/<?php echo "$place";?>.jpeg" class="float-left w-1/3 mr-2 mb-2"/>
						<?php
							if ($_SESSION['place'] === "Jacksonville") {
								echo "Jacksonville is a city located on the Atlantic coast of northeastern Florida, the most populous city proper in the state and the second largest city by area in the contiguous United States as of 2020. It is the seat of Duval County, with which the city government consolidated in 1968.";
								echo "</br> Jacksonville is known for its rich art and museum culture, beautiful beaches, and wide variety of natural tourist attractions.";
								echo "</br> When visiting Jacksonville, beware of alligators, sharks, and the humid weather!";
								echo "</br> Population as of 2021: 954,614"; 						
							}
							if ($_SESSION['place'] === "Gainesville") {
								echo "Gainesville is a city in northern Florida. It's known for the University of Florida. Set on the sprawling campus, the Florida Museum of Natural History houses fossils and ethnographic exhibits. It includes the Butterfly Rainforest, home to hundreds of free-flying butterflies and birds. Harn Museum of Art has a huge collection of Asian and African works. The Matheson History Museum has a vintage postcard collection.";
								echo "</br> Gainesville is known for its youthful population of college students, creative cultural scene, and beautiful nature.";
								echo "</br> When visiting Gainesville, beware of alligators and the humid weather!";
								echo "</br> Population as of 2021: 140,398";
							}
							if ($_SESSION['place'] === "Tampa") {
								echo "Tampa is a city on Tampa Bay, along Florida’s Gulf Coast. A major business center, it’s also known for its museums and other cultural offerings. Busch Gardens is an African-themed amusement park with thrill rides and animal-viewing areas. The historic Ybor City neighborhood, developed by Cuban and Spanish cigar-factory workers at the turn of the 20th century, is a dining and nightlife destination.";
								echo "</br> Tampa is known for its beaches, exciting amusement parks, and rich cultural history.";
								echo "</br> When visiting Tampa, beware of alligators, sharks, and the humid weather!";
								echo "</br> Population as of 2021: 387,050";
							}
						?>
				</div>
				<div class="mt-2 text-2xl font-bold">Your Selected Activities</div>
				<form method="get" action="" name='actForm'>
					<div class="container m-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
						<?php
						if ($result->num_rows > 0) {
							// Output data of each row
							while ($row = $result->fetch_assoc()) {
								$activityid = $row['activityid'];
								echo "<div class='bg-white rounded-lg shadow-md p-4 mb-4 image-full'>";
								echo "<button class='btn btn-xs btn-square float-right btn-primary text-white mb-2 -mt-1' name='activityid' value='$activityid' onClick='remove()'>";
								echo "<svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'>";
								echo "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12' /></svg>";
								echo "</button>";
								echo "<img src='" . $row['Main_image'] . "'/>";
								echo "<h2 class='text-lg font-bold mb-2'>" . $row['Title'] . "</h2>";
								echo "<p class='text-sm mb-4'>" . $row['Description'] . "</p>";
								echo "<div class='flex justify-between items-center mb-4'>";
								echo "<div>";
								echo "<h3 class='text-lg font-bold text-primary mb-2 underline'>Price Range</h3>";
								echo "<p class='text-base font-bold text-primary'>" . $row['Price_Range'] . "</p>";
								echo "</div>";
								echo "<div>";
								echo "<h3 class='text-lg font-bold text-primary mb-2 underline'>Rating</h3>";
								echo "<p class='text-base font-bold text-primary'>" . $row['Review_points'] . "</p>";
								echo "</div>";
								echo "</div>";
								echo "</div>";
							}
						} else {
							echo "No activities found";
						}
						$conn->close();
						?>
					</div>
				</form>
			</div>	
		</div>
	</div>
</body>
</html>
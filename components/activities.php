#!/usr/local/bin/php
<?php
	require_once('../backend/config.php');
	session_start();
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
		header("location: ../backend/login.php");
		exit;
	}
	$place = $_SESSION['place'];
	$place = strtolower($place);
	$sql = "SELECT LocationID, Title, Review_points, Main_image, Description, Price_Range FROM locations WHERE LOWER(locations.City) LIKE '%" .$place . "%'";
	$result = $conn->query($sql);
?>

<html>
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<title>Bookify</title>
</head>
<script type="text/javascript">
	function add() {
		document.actForm.action = "../backend/addactivity.php";
		document.actForm.submit();
	}
	function searchData() {
		var dbParam = document.getElementById("search").value;
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
		  document.getElementById("activityCont").innerHTML = this.responseText;
		}
		xhttp.open("GET", "searchActivity.php?search=" + dbParam);
		xhttp.send();
	}
	function sortData() {
		var dbParam = document.getElementById("sort").value;
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
		  document.getElementById("activityCont").innerHTML = this.responseText;
		}
		xhttp.open("GET", "sortActivity.php?sort=" + dbParam);
		xhttp.send();
	}
</script>

<body>
	<?php
	include 'navbar_logged_in.php';
	?>
	<div data-theme="cupcake" class="h-auto overflow-auto min-h-screen flex flex-col bg-base-100">
		<div class="card w-full md:w-3/4 md:mt-12 lg:w-2/3 mb-4 mx-auto bg-base-100 md:shadow-lg overflow-auto">
			<div class="card-body">
				<div class="card-title">
					<button class="mt-1 btn-sm btn btn-square btn-primary" onClick="location.href='vacations.php'">
  						<svg class="w-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          					<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        				</svg>
        			</button>
					<p class="text-2xl md:text-5xl"><?php
						echo $_SESSION['name'];
					?></p>
					<ul class="menu menu-horizontal bg-base-100 rounded-box">
						<li><a class="hover:bg-base-100 hover:underline" onclick="location.href='vacation.php'">Location Info</a></li>
						<li><a class="hover:bg-base-100 underline">Activities</a></li>
					</ul>
				</div>
				<p class="text-lg md:text-2xl italic"><?php
					echo $_SESSION['place'];
					?></p>
				<input type="text" name="search" id="search" placeholder="Search for activities" class="input input-bordered" onkeyup="searchData()"/>
					<select class="select w-fit md:w-1/5 bg-primary" id="sort" name="sort" onchange="sortData()">
						<option disabled selected>Sort</option>
						<option value="none">None</option>
						<option value="rating">Rating</option>
					</select>
				<form method="get" action="" name='actForm'>
					<div id="activityCont" class="container m-auto grid grid-flow-row grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
						<?php
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
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
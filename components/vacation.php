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
	$sql = "SELECT name, place FROM vacations WHERE vacationID = $vacationid";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row) {
		$name = $row['name'];
		$place = $row['place'];
		$_SESSION['place'] = $place;
		$_SESSION['name'] = $name;
	}
	$sql = "SELECT activityid FROM activities INNER JOIN locations ON activities.locationid = locations.LocationID WHERE activities.vacationid = $vacationid";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();
	if($row) {
		$activityid = $row['activityid'];
	}
	
	$sql = "SELECT Title, Review_points, Main_image, Description, Price_Range FROM locations INNER JOIN activities ON activities.locationid = locations.LocationID WHERE activities.vacationid = $vacationid";
	$result = $conn->query($sql);
?>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
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
      $(document).ready(function(){
        $("#nav").load("navbar.html");
      });
      function openForm() {
	  	document.getElementById("introForm").style.display = "block";
	  	document.getElementById("introCard").style.display = "none";
	}
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
	<div id="introCard" class="card w-2/3 mt-12 mb-4 mx-auto bg-base-100 shadow-lg overflow-auto">
  		<div class="card-body">
  			<div class="card-title">
			<p class="text-4xl italic"><?php 
    			echo $_SESSION['name'];
    		?></p>
    		<ul class="menu menu-horizontal bg-base-100 rounded-box">
  				<li><a class="hover:bg-base-100 underline">Location Info</a></li>
  				<li><a class="hover:bg-base-100 hover:underline" onclick="location.href='activities.php'">Activities</a></li>
			</ul>
  		</div>
  		<p class="text-4xl italic"><?php 
    			echo $_SESSION['place'];
    		?></p>
  			<img src="../images/<?php echo "$place";?>.jpeg" class="float-left w-1/4"/>
  			<div class="float-right">"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</div>
  			<div class="text-2xl font-bold">Your Selected Activities</div>
  			<form method="get" action="" name='actForm'>
  			<div class="container m-auto grid grid-cols-4 gap-4">
				<?php
				if ($result->num_rows > 0) {
					// Output data of each row
					while ($row = $result->fetch_assoc()) {
						echo "<div class='bg-white rounded-lg shadow-md p-4 mb-4 image-full'>";
						echo "<button class='btn btn-xs btn-square float-right btn-primary text-white mb-2 -mt-1' name='activityid' value='$activityid' onClick='remove()'>";
						echo "<svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'>";
						echo "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12' /></svg>";
						echo "</button>";
						echo "<img src='" . $row['Main_image'] . "'/>";
						echo "<h2 class='text-lg font-bold mb-2'>" . $row['Title'] . "</h2>";
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
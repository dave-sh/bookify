#!/usr/local/bin/php
<?php
require_once('../backend/config.php');
session_start();
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
	header("location: ../backend/login.php");
	exit;
}
$place = $_SESSION['place'];
$name = $_GET["name"];
$place = strtolower($place);
$sql = "SELECT LocationID, Title, Review_points, Main_image, Description, Price_Range FROM locations WHERE LOWER(locations.City) LIKE '%" .$place . "%'";
$result = $conn->query($sql);
?>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
	<!-- <link href="style.css" rel="stylesheet" type="text/css" /> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<title>Bookify</title>
</head>
<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
<script type="text/javascript">
	$(document).ready(function () {
		$("#nav").load("navbar.html");
	});
	function openForm() {
		document.getElementById("introForm").style.display = "block";
		document.getElementById("introCard").style.display = "none";
	}
	function add() {
		document.actForm.action = "../backend/addactivity.php";
		document.actForm.submit();
	}
</script>

<body>
<div data-theme="cupcake" class="h-full overflow-auto min-h-screen flex flex-col bg-base-100">
	<!-- Display links for logged-in users -->
	<div class="navbar bg-primary">
    <div class="flex-1">
      <a href="../../bookify/index.php" class="hover:cursor-pointer hover:underline text-white font-bold text-4xl">Bookify</a>
    </div>
    <div class="flex-none">
		<form action="#" method="post" class="text-white inline">
           <!-- <button class="hover:underline mt-4 text-white text-xl font-bold">
            	<?php echo "User is".$_SESSION['login_user']; ?>
            Profile</button> |&nbsp;
          </form>-->
          <form action="#" method="get" class="inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold mr-2">Logout</button>
          </form>
    </div>
    </div>
	<div id="introCard" class="card w-2/3 mt-12 mx-auto bg-base-100 shadow-xl overflow-auto">
  		<div class="card-body">
  			<div class="card-title">
			<p class="text-4xl italic"><?php 
    			echo $_SESSION['name'];
    		?></p>
				<ul class="menu menu-horizontal bg-base-100 rounded-box">
					<li><a class="hover:bg-base-100 hover:underline" onclick="location.href='vacation.php'">Location Info</a></li>
					<li><a class="hover:bg-base-100 underline">Activities</a></li>
				</ul>
			</div>
			<p class="text-4xl italic"><?php 
    			echo $_SESSION['place'];
    		?></p>
			<input type="text" name="place" id="place" placeholder="Search for activities"
				   class="input input-bordered" />
			<select class="select w-full max-w-xs">
				<option disabled selected>Sort</option>
				<option>Cost</option>
				<option>Rating</option>
			</select>
			<form method="get" action="" name='actForm'>
			<div class="container m-auto grid grid-cols-4 gap-4">
				<?php
				if ($result->num_rows > 0) {
					// Output data of each row
					while ($row = $result->fetch_assoc()) {
						$locationid = $row['LocationID'];
						echo "<div class='bg-white rounded-lg shadow-md p-4 mb-4'>";
						echo "<h2 class='text-2xl font-bold mb-2'>" . $row['Title'] . "</h2>";
						echo "<img src='" . $row['Main_image'] . "' alt='Product Image' class='w-full mb-4'>";
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
						echo "<button class='bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-lg' name='locationid' value='$locationid' onClick='add()'>Add</button>";
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
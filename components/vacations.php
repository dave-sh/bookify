#!/usr/local/bin/php
<?php
require_once('../backend/config.php');
session_start();
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
	header("location: ../backend/login.php");
	exit;
}
	$email = $_SESSION['login_user'];
	
	$sql = "SELECT vacations.name, vacations.place, vacations.vacationID FROM vacations INNER JOIN User ON User.UserID = vacations.userID";
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
        $("#nav").load("components/navbar.html");
      });
      function openForm() {
	  	document.getElementById("introForm").style.display = "block";
	  	document.getElementById("introCard").style.display = "none";
	}
		function remove() {
		document.vacForm.action = "../backend/deletevacay.php";
		document.vacForm.submit();
	}
	function editVacation() {
		document.vacForm.action = "vacation.php";
		document.vacForm.submit();
	}
	
    </script>
<body>
<div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
	<!-- Display links for logged-in users -->
	<div data-theme="cupcake" class="navbar bg-primary">
    <div class="flex-1">
      <a href="../../bookify/index.php" class="hover:cursor-pointer hover:underline text-white font-bold text-4xl">Bookify</a>
    </div>
    <div class="flex-none">
		<form action="#" method="post" class="text-white inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold">
            	<!--<?php echo $_SESSION['email']; ?> -->
            Profile</button> |&nbsp;
          </form>
          <form action="../backend/logout.php" method="get" class="inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold mr-2">Logout</button>
          </form>
    </div>
  </div>
	<div id="introCard" class="card w-2/3 mt-12 mb-4 mx-auto bg-base-100 p-4 shadow">
  		<p class="text-4xl italic">Your Vacations:</p>
  	</div>
  	<!-- if there are no vacations just have a plus button -->
  	<button onclick="location.href='addvacay.html'" class="btn btn-primary container w-2/3 mx-auto rounded-lg border-2 p-4 text-2xl text-center">
  		<div class="text-white italic -mt-2">Add Vacation</div>
  	</button>
  	<form method="get" action="" name='vacForm'>
  	<div class="container w-2/3 mt-4 mx-auto grid grid-cols-2 gap-4 overflow-auto mb-4">
  		<?php
			if ($result->num_rows > 0) {
				// Output data of each row
				while ($row = $result->fetch_assoc()) {
					if (is_null($row["name"])) {
						continue;
					}
					$vacationid = $row["vacationID"];
					echo "<div class='container rounded-lg border-2 p-4'>";
					echo "<button class='btn btn-xs btn-square float-right btn-primary text-white' name='vacationid' value='$vacationid' onClick='remove()'>";
					echo "<svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'>";
					echo "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12' /></svg>";
					echo "</button>";
					echo "<div class='float'>";
					echo "<h2 class='card-title'>" .$row["name"]. "</h2>";
					echo "<h3>".$row["place"]."</h3>";
					echo "</div>";
					echo "<button class='hover:bg-base-100 hover:underline mt-4 text-primary font-bold' name='vacationid' value='$vacationid' onClick='editVacation()'>View Vacation</button>";
					echo "</div>";
				}
				} else {
					echo "No vacations found";
				}
				$conn->close();
				?>
			</div>
			</form>
	</div>
</body>
</html>
#!/usr/local/bin/php
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true){
    header("location: ../index.php");
    exit;
}
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
            	<?php echo $_SESSION['email']; ?>
            Profile</button> |&nbsp;
          </form>
          <form action="#" method="get" class="inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold mr-2">Logout</button>
          </form>
    </div>
  </div>
	<div id="introCard" class="card w-2/3 mt-12 mb-4 mx-auto bg-base-100 p-4 shadow">
  		<p class="text-4xl italic">Your Vacations:</p>
  	</div>
  	<!-- if there are no vacations just have a plus button -->
  	<button onclick="location.href='addvacay.php'" class="btn btn-primary container w-2/3 mx-auto rounded-lg border-2 p-4 text-5xl text-center font-bold">
  		<div class="text-white -mt-5">+</div>
  	</button>
  	<div class="container w-2/3 mt-4 mx-auto grid grid-cols-2 gap-4">
					<div class="container rounded-lg border-2 p-4">
						<div class="float">
						<h2 class="card-title">vacation</h2>
						<button class="btn btn-xs btn-square float-right btn-primary text-white -mt-8">
  							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
						</button>
						</div>
						<p>Info: Dates, details</p>
						<button class="hover:bg-base-100 hover:underline mt-4 text-primary font-bold">Edit</button>
					</div>
			</div>
	</div>
</body>
</html>
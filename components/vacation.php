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
        $("#nav").load("navbar.html");
      });
      function openForm() {
	  	document.getElementById("introForm").style.display = "block";
	  	document.getElementById("introCard").style.display = "none";
	}
    </script>
<body>
<div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
	<!-- Display links for logged-in users -->
	<div class="navbar bg-primary">
    <div class="flex-1">
      <a href="../../bookify/index.php" class="hover:cursor-pointer hover:underline text-white font-bold text-4xl">Bookify</a>
    </div>
    <div class="flex-none">
		<form action="#" method="post" class="text-white inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold">
            	<?php echo "User is".$_SESSION['login_user']; ?>
            Profile</button> |&nbsp;
          </form>
          <form action="#" method="get" class="inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold mr-2">Logout</button>
          </form>
    </div>
  </div>
	<div id="introCard" class="card w-2/3 mt-12 mx-auto bg-base-100 shadow-xl">
  		<div class="card-body">
  			<div class="card-title">
    		<p class="text-4xl italic"><?php 
    			$place = htmlspecialchars($_GET['place']);
    			echo "$place";
    		?></p>
    		<ul class="menu menu-horizontal bg-base-100 rounded-box">
  				<li><a class="hover:bg-base-100 underline">Location Info</a></li>
  				<li><a class="hover:bg-base-100 hover:underline" onclick="location.href='activities.php'">Activities</a></li>
  				<li><a class="hover:bg-base-100 hover:underline">Item 3</a></li>
			</ul>
  		</div>
  		<img src="../images/<?php echo "$place";?>.jpeg" class="float-left w-1/4"/>
  		<div class="float-right">"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</div>
  		</div>	
  		</div>
	</div>
</body>
</html>
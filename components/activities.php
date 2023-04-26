#!/usr/local/bin/php
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
	<div class="navbar bg-secondary">
    	<div class="flex-1">
      		<a class="btn btn-ghost normal-case text-xl" onclick="location.href='../index.php'">Bookify</a>
    	</div>
    	<div class="flex-none">
      		<div class="dropdown dropdown-end">
       	 		<label tabindex="0" class="btn btn-ghost btn-circle avatar">
          		<div class="w-10 rounded-full">
            		<img src="../images/empty.png" />
          		</div>
        		</label>
        		<ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          			<li>
						<a class="justify-between">
						  Profile
						</a>
          			</li>
				  <li><a href='vacations.php'>Vacations</a></li>
				  <li><a>Logout</a></li>
        		</ul>
      		</div>
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
					<li><a class="hover:bg-base-100 hover:underline" onclick="location.href='vacation.php'">Location Info</a></li>
					<li><a class="hover:bg-base-100 underline">Activities</a></li>
					<li><a class="hover:bg-base-100 hover:underline">Item 3</a></li>
				</ul>
  			</div>
  			<input type="text" name="place" id="place" placeholder="Search for activities" class="input input-bordered" />
  			<select class="select w-full max-w-xs">
			  <option disabled selected>Sort</option>
			  <option>Cost</option>
			  <option>Rating</option>
			</select>
			<div class="container m-auto grid grid-cols-4 gap-4">
					<div class="container rounded-lg border-2 p-4">
						<h2 class="card-title">activity</h2>
						<p>Info: Cost, type of activity, open times</p>
						<button class="hover:bg-base-100 hover:underline mt-4 text-primary font-bold">Add</button>
					</div>
					<div class="container rounded-lg border-2 p-4">
						<h2 class="card-title">activity</h2>
						<p>Info: Cost, type of activity, open times</p>
						<button class="hover:bg-base-100 hover:underline mt-4 text-primary font-bold">Add</button>
					</div>
					<div class="container rounded-lg border-2 p-4">
						<h2 class="card-title">activity</h2>
						<p>Info: Cost, type of activity, open times</p>
						<button class="hover:bg-base-100 hover:underline mt-4 text-primary font-bold">Add</button>
					</div>
					<div class="container rounded-lg border-2 p-4">
						<h2 class="card-title">activity</h2>
						<p>Info: Cost, type of activity, open times</p>
						<button class="hover:bg-base-100 hover:underline mt-4 text-primary font-bold">Add</button>
					</div>
					<div class="container rounded-lg border-2 p-4">
						<h2 class="card-title">activity</h2>
						<p>Info: Cost, type of activity, open times</p>
						<button class="hover:bg-base-100 hover:underline mt-4 text-primary font-bold">Add</button>
					</div>
			</div>
  	</div>
  </div>
</div>
</body>
</html>
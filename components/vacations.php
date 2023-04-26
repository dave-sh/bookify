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
	<div id="introCard" class="card w-2/3 mt-12 mb-4 mx-auto bg-base-100 p-4 shadow">
  		<p class="text-4xl italic">Your Vacations:</p>
  	</div>
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
					<div class="container rounded-lg border-2 p-4">
						<div class="float">
						<h2 class="card-title">vacation</h2>
						<button class="btn btn-xs btn-square float-right btn-primary text-white -mt-8">
  							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
						</button>
						</div>
						<p>Info: dates, details</p>
						<button class="hover:bg-base-100 hover:underline mt-4 text-primary font-bold">Edit</button>
					</div>
			</div>
	</div>
</body>
</html>
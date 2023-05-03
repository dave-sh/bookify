#!/usr/local/bin/php
<html>
<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <title>Bookify</title>
</head>
	<?php
		session_start();
		if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) {
		  header("location: components/vacations.php");
		  exit;
		} else {
		  include './components/navbar_logged_out.php';
		}
	?>
<body>
  <div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
      <div class="card w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 mt-12 m-auto bg-base-100 shadow-xl image-full">
        <figure><img src="images/florida.jpeg"/></figure>
        <div class="card-body items-center text-center">
        	<div class="card-title">
        	 	<p class="text-5xl sm:mt-8 md:mt-12 lg:mt-36 italic">If you could go anywhere where would you go?</p>
        	</div>
        	<button onclick="location.href='backend/signup.html'" class="btn mt-8 sm:mt-12 md:mt-24 lg:mt-36 max-w-fit hover:cursor-pointer hover:text-base-200 font-bold text-2xl">Get Booking</button>
        </div>
      </div>
  </div>
</body>

</html>
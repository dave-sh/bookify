#!/usr/local/bin/php
<html>
<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <title>Bookify</title>
</head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  /*$(document).ready(function () {
    $("#nav").load("components/navbar.html");
  });
*/


</script>
<?php
session_start();
?>
  <div data-theme="cupcake" class="navbar bg-primary">
    <div class="flex-1">
        <a href="../../bookify/index.php" class="hover:cursor-pointer hover:underline text-white font-bold text-4xl">Bookify</a>
    </div>
    <div class="flex-none">
        <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']):
            header("location: components/vacations.php");
            exit;
          ?>
        <?php else: ?>
<!-- Display links for non-logged-in users -->
<form action="backend/signup.html" method="post" class="text-white inline">
  <button class="hover:underline mt-4 text-white text-xl font-bold">Sign Up</button> |&nbsp;
</form>
<form action="backend/login.php" method="get" class="inline">
  <button class=" hover:underline mt-4 text-white text-xl font-bold mr-2">Login</button>
</form>
<?php endif; ?>
</div>
</div>



<body>
  <div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
  <div id="nav"></div>
    <div class="bg-base-200 flex-1">
      <div id="introCard" class="card w-1/2 mt-12 mx-auto bg-base-100 shadow-xl image-full">
        <figure><img src="images/florida.jpeg"/></figure>
        <div class="card-body items-center text-center">
          <p class="text-4xl mt-24 italic">If you could go anywhere where would you go?</p>
          <div class="form-control">
            <form action="components/activities.php" method="get">
            <select id="place" name="place" class="select select-lg select-ghost w-full mb-2">
              <option disabled selected>---</option>
              <option value="Tampa">Tampa, FL</option>
              <option value="Jacksonville">Jacksonville, FL</option>
              <option value="Gainesville">Gainesville, FL</option>
            </select>
              <br><button class="hover:cursor-pointer hover:underline font-bold text-2xl">Get Booking</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>
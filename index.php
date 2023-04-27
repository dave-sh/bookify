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
  $(document).ready(function () {
    $("#nav").load("components/navbar.html");
  });

</script>

<body>
  <div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
    <div class="navbar bg-primary">
      <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">Bookify</a>
      </div>
      <div class="flex-none">
        <div class="dropdown dropdown-end">
          <!-- <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img src="images/empty.png" />
          </div>
        </label> -->
          <!-- <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li>
            <a class="justify-between">
              Profile
            </a>
          </li>
          <li><a href='components/vacations.php'>Vacations</a></li>
          <li><a>Logout</a></li>
        </ul> -->
          <form action="components/signup.html" method="post" class="inline">
            <button class="mt-2 btn btn-secondary"> Sign Up </button>
          </form>
          <form action="components/login.php" method="get" class="inline">
            <button class="mt-2 btn btn-secondary"> Login </button>
          </form>
        </div>
      </div>
    </div>

    <div class="bg-base-200 flex-1">
      <div id="introCard" class="card w-1/2 mt-12 mx-auto bg-base-100 shadow-xl image-full">
        <figure><img src="images/florida.jpeg" alt="Shoes" /></figure>
        <div class="card-body items-center text-center">
          <p class="text-4xl mt-24 italic">If you could go anywhere where would you go?</p>
          <div class="form-control -mt-8">
            <form action="components/vacation.php" method="get">
              <input type="text" name="place" id="place" placeholder="Search" class="input input-bordered" />
              <br><button class="mt-2 btn btn-primary">Get Booking</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>
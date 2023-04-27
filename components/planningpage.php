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
<!--<script type="text/javascript" src="js/jquery.js"></script>-->
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
    <div class="navbar bg-primary">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl" onclick="location.href='../index.php'">Bookify</a>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="../images/empty.png" alt="pfp"/>
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
        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content text-center">
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body items-center text-center">
                        <p>What city are you traveling to?</p>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Tampa</span>
                                <input type="radio" name="radio-10" class="radio radio-accent" checked />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Jacksonville</span>
                                <input type="radio" name="radio-10" class="radio radio-accent" checked />
                            </label>
                        </div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">Gainesville</span>
                                <input type="radio" name="radio-10" class="radio radio-accent" checked />
                            </label>
                        </div>
                    </div>
                    <figure><img src="/images/florida.jpeg" alt="jax" /></figure>
                </div>

                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body items-center text-center">
                        <p>What are you looking for?</p>
                        <div class="form-control" style="text-align: left;">
                            <label class="label cursor-pointer">
                                <input type="checkbox" class="checkbox checkbox-primary" style="float:left; margin-right:10px;" />
                                <span class="label-text">Restaurants</span>
                            </label>
                            <label class="label cursor-pointer">
                                <input type="checkbox" class="checkbox checkbox-primary" style="float:left; margin-right:10px;" />
                                <span class="label-text">Tourist Attractions</span>
                            </label>
                        </div>
                    </div>
                    <figure><img src="/images/disneysprings.jpg" alt="disney" /></figure>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
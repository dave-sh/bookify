<div data-theme="cupcake" class="navbar bg-primary">
    <div class="flex-1">
        <a href="../../bookify/index.php" class="hover:cursor-pointer hover:underline text-white font-bold text-4xl">Bookify</a>
    </div>
    <div class="flex-none">
        <!-- Display links for non-logged-in users -->
        <form action="backend/signup.html" method="post" class="text-white inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold">Sign Up</button> |&nbsp;
        </form>
        <form action="backend/login.php" method="get" class="inline">
            <button class="hover:underline mt-4 text-white text-xl font-bold mr-2">Login</button>
        </form>
    </div>
</div>
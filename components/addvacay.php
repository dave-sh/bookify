#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DaisyUI CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Add New Vacation</title>
</head>
<body>
    <div data-theme="cupcake" class="h-full min-h-screen flex flex-col bg-base-100">
        <div class="max-w-md mx-auto w-2/3 mt-36 bg-white rounded-xl shadow-md overflow-hidden p-6">
            <div class="form-control">
            <form action="vacation.php" method="get">
            <select id="place" name="place" class="select w-full mb-2" required>
              <option disabled selected>Select Location</option>
              <option value="Tampa">Tampa, FL</option>
              <option value="Jacksonville">Jacksonville, FL</option>
              <option value="Gainesville">Gainesville, FL</option>
            </select>
              <br><button class="hover:cursor-pointer text-primary ml-36 hover:underline font-bold text-xl">Add Vacation</button>
            </form>
          </div>
        </div>
    </div>

</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body style="background-image: url('client/imgs/lib.jpg');background-repeat: no-repeat; background-size: cover;" class="bg-gray-300">
    <nav class="flex flex-wrap items-center justify-between p-2 bg-blue-200">
        <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png" width="40" height="40" />
            </button>
        </div>



        <div class="toggle hidden md:flex w-full md:w-auto text-right text-bold mt-5 md:mt-0 border-t-2 border-blue-900 md:border-none" id="navbarSupportedContent">
            <a class="block md:inline-block text-blue-900 px-3 py-3 border-b-2 border-blue-900 md:border-none" href="#">LibMe</a>
            <a class="block md:inline-block text-blue-900 hover:text-blue-900 px-3 py-3 border-b-2 border-blue-900 md:border-none" href="#">Home </a>
        </div>
        <div class="toggle hidden md:flex w-full md:w-auto text-right text-bold mt-5 md:mt-0 border-t-2 border-blue-900 md:border-none">
            <a class="mx-3 toggle hidden md:flex w-full md:w-auto  px-4 py-2 text-right bg-blue-700 hover:bg-blue-900 text-white md:rounded" href="client/admin/admin-login.php">Admin login</a>
            <a class="mx-3 toggle hidden md:flex w-full md:w-auto  px-4 py-2 text-right bg-blue-700 hover:bg-blue-900 text-white md:rounded" href="client/login.php">User Login</a>

        </div>

    </nav>
    <div class="wrapper">
        <div class="flex justify-center">
            <div class="w-8/12 bg-white p-6 rounded-lg mt-5 shadow-xl">
                <h1 class="text-blue-800 text-bold text-4xl">Welcome to LibMe library management portal!!</h1>
            </div>
        </div>
    </div>
    <script src="scripts/toggle.js"></script>
</body>

</html>
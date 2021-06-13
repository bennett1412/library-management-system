<?php
session_start();
include_once 'admin-config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <base href="http://localhost/lib-man-proj/client/admin/"> <!-- solved the path issue -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-gray-300">
    <nav class="flex flex-wrap items-center justify-between p-2 bg-blue-200">
        <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png" width="40" height="40" />
            </button>
        </div>



        <div class="toggle hidden md:flex w-full md:w-auto text-right text-bold mt-5 md:mt-0 border-t-2 border-blue-900 md:border-none" id="navbarSupportedContent">
            
                 <?php if (isset($_SESSION["id"])) {
            echo '<a class="block md:inline-block text-blue-900 px-3 py-3 border-b-2 border-blue-900 md:border-none" href="javascript:window.location.href=window.location.href">LibMe</a>';
            echo '<a class="block md:inline-block text-blue-900 hover:text-blue-900 px-3 py-3 border-b-2 border-blue-900 md:border-none" href="admin-dashboard.php">Dashboard</a>';
            echo '<a class="block md:inline-block text-blue-900 hover:text-blue-900 px-3 py-3 border-b-2 border-blue-900 md:border-none" href="issue-book.php">Issue</a>';
            } 
            else {
                echo '<a class="block md:inline-block text-blue-900 px-3 py-3 border-b-2 border-blue-900 md:border-none" href="../../index.php">LibMe</a>';
            }
            ?>

        </div>
        <div class="toggle hidden md:flex w-full md:w-auto text-right text-bold mt-5 md:mt-0 border-t-2 border-blue-900 md:border-none">
            <?php
            if (isset($_SESSION["id"])) {
                echo '<a class="mx-3 toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right bg-blue-700 hover:bg-blue-900 text-white md:rounded" href="auth/logout.inc.admin.php">Logout</a></li>';
                echo '<a class="mx-3 toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right bg-blue-700 hover:bg-blue-900 text-white md:rounded" href="admin-profile.php">View Profile</a></li>';
                echo '<a class="mx-3 toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right bg-blue-700 hover:bg-blue-900 text-white md:rounded" href="admin-update_profile.php">Update Profile</a></li>';
            } else {
                echo '<a class="mx-3 toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right bg-blue-700 hover:bg-blue-900 text-white md:rounded" href="admin-login.php">Login</a>';
            }
            ?>
        </div>
    </nav>
    <div class="wrapper">
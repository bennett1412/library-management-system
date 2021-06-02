<?php
require_once('../server/db_connect.php');
?>
<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there, <?php echo $_SESSION["name"] ?></span>
    </div>
    <div>
        <a href="search-books.php">
            <div class=" p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold">Search</span>
            </div>
        </a>
    </div>
</div>
<div class="grid grid-cols-3">

    <div class=" bg-white p-6 rounded-lg mt-5 mx-5">
        <div class="bg-blue-500 border rounded w-full py-2 px-3 text-white bold">
            Number of books
        </div>
        <div class="text-center mt-10 text-5xl" style="width: 300px">
            <?php echo getBookCount($conn)["count(B_NO)"] ?>
        </div>
    </div>


    <div class="bg-white p-6 rounded-lg mt-5 mx-5">
        <div class="bg-green-500 border rounded w-full py-2 px-3 text-white bold">
            Number of issued books
        </div>
        <div class="text-center mt-10 text-5xl" style="width: 300px">
            <?php echo getIssueCount($conn, $_SESSION['id'])["count(issue_id)"] ?>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg mt-5 mx-5">
        <div class="bg-purple-500 border rounded w-full py-2 px-3 text-white bold">
            Quick Actions
        </div>

        <a class="flex justify-center text-center" href="listbooks.php">
            <div class="hover:bg-blue-600 px-2 w-1/2 mt-2 bg-blue-400 rounded p-1 text-white font-bold">
                List Books
            </div>
        </a>
        <a class="flex justify-center text-center" href="user-request.php">
            <div class="hover:bg-green-600 px-2 w-1/2 mt-2 bg-green-400 rounded p-1 text-white font-bold">
                Make A Request!
            </div>
        </a>
    </div>
</div>
<div class="bg-white p-6 rounded-lg mt-5 mx-5 justify-center">
    <div class="text-center bg-indigo-500 border rounded w-full py-2 px-3 text-white bold">
        List of books issued
    </div>
    <!-- TODO addd a table here -->
    <?php include_once 'auth/listissues.inc.php' ?>
    <style>
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            transform: translate(0) scale(1);
            visibility: visible;
        }
    </style>
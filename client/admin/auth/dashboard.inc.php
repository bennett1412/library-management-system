<?php
require_once('../../server/db_connect.php');
?>
<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there,<?php echo $_SESSION["name"] ?></span>
    </div>
    <div>
        <a href="#">
            <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold">Search</span>
            </div>
        </a>
        <a href="#">
            <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold">Add</span>
            </div>
        </a>
        <a href="#">
            <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold">Remove</span>
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
            Number of users
        </div>
        <div class="text-center mt-10 text-5xl" style="width: 300px">
            <?php echo getUserCount($conn)["count(id)"] ?>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg mt-5 mx-5">
        <div class="bg-purple-500 border rounded w-full py-2 px-3 text-white bold">
            Quick Summary
        </div>
        <div class="px-2" style="width: 300px">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sunt excepturi, nisi provident qui dolorem sit velit commodi eum ex aut, nostrum ullam labore eius officiis nam eos quos officia.
        </div>
    </div>
</div>
<div class="bg-white p-6 rounded-lg mt-5 mx-5 justify-center">
    <div class="text-center bg-indigo-500 border rounded w-full py-2 px-3 text-white bold">
        Requests
    </div>
    <div class="w-full px-2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sunt excepturi, nisi provident qui dolorem sit velit commodi eum ex aut, nostrum ullam labore eius officiis nam eos quos officia.
    </div>

</div>
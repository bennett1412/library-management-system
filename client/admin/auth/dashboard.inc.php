<?php
require_once('../../server/db_connect.php');
?>
<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there, <?php echo $_SESSION["name"] ?></span>
    </div>
    <div>
        <a href="#">
            <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold">Search</span>
            </div>
        </a>

        <div class="dropdown p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
            <span class="rounded-md shadow-s"><button class="inline-flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold transition duration-150 ease-in-out focus:outline-nonet">
                    <span class="">Add</span>
                    <svg class="w-3 h-3 ml-1 -mr-1 align-center" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button></span>

            <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                <div class="absolute right-0 w-56 mt-8 origin-top-right bg-indigo-500 divide-y divide-gray-100 rounded-md shadow-lg outline-none border border-indigo-800" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                    <div class="py-1 divide-y divide-indigo-800">
                        <a href="#" tabindex="0" class="text-white flex justify-between w-full px-4 py-2 text-sm leading-5 hover:font-bold text-left" role="menuitem">Students</a>
                        <a href="#" tabindex="1" class="text-white flex justify-between w-full px-4 py-2 text-sm leading-5 hover:font-bold text-left" role="menuitem">Books</a>

                    </div>
                </div>
            </div>
        </div>

        <!-- <div class=" relative inline-block text-left dropdown p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full hover:bg-indigo-500">
            <span class="rounded-md shadow-sm"><button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5  transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800" type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                    <span>Options</span>
                    <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button></span>
            <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                <div class="absolute right-0 w-56 mt-2 origin-top-right bg-indigo-800 divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                    <div class="px-4 py-3">
                        <p class="text-sm leading-5">Signed in as</p>
                        <p class="text-sm font-medium leading-5 text-gray-900 truncate">tom@example.com</p>
                    </div>
                    <div class="py-1">
                        <a href="javascript:void(0)" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem">Account settings</a>
                        <a href="javascript:void(0)" tabindex="1" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem">Support</a>
                        <span role="menuitem" tabindex="-1" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 cursor-not-allowed opacity-50" aria-disabled="true">New feature (soon)</span>
                        <a href="javascript:void(0)" tabindex="2" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem">License</a>
                    </div>
                    <div class="py-1">
                        <a href="javascript:void(0)" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left" role="menuitem">Sign out</a>
                    </div>
                </div>
            </div>
        </div> -->
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
            Quick Actions
        </div>

        <a class="flex justify-center text-center" href="listbooks.php">
            <div class="hover:bg-blue-600 px-2 w-1/2 mt-2 bg-blue-400 rounded p-1 text-white font-bold">
                List Books
            </div>
        </a>
        <a class="flex justify-center text-center" href="listusers.php">
            <div class="hover:bg-green-600 px-2 w-1/2 mt-2 bg-green-400 rounded p-1 text-white font-bold">
                List Users
            </div>
        </a>
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
<style>
    .dropdown:focus-within .dropdown-menu {
        opacity: 1;
        transform: translate(0) scale(1);
        visibility: visible;
    }
</style>
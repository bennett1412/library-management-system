<?php
require_once('../../server/db_connect.php');
?>
<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there, <?php echo $_SESSION["name"] ?></span>
    </div>
    <div>
        <div class="dropdown p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
            <span class="rounded-md shadow-s"><button class="inline-flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold transition duration-150 ease-in-out hover:outline-nonet">
                    <span class="">Search</span>
                    <svg class="w-3 h-3 ml-1 -mr-1 align-center" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button></span>

            <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                <div class="absolute right-0 w-56 mt-8 origin-top-right bg-indigo-500 divide-y divide-gray-100 rounded-md shadow-lg outline-none border border-indigo-800" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                    <div class="py-1 divide-y divide-indigo-800">
                        <a href="search-users.php" tabindex="0" class="text-white flex justify-between w-full px-4 py-2 text-sm leading-5 hover:font-bold text-left" role="menuitem">Users</a>
                        <a href="search-books.php" tabindex="1" class="text-white flex justify-between w-full px-4 py-2 text-sm leading-5 hover:font-bold text-left" role="menuitem">Books</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="dropdown p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
            <span class="rounded-md shadow-s"><button class="inline-flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold transition duration-150 ease-in-out hover:outline-nonet">
                    <span class="">Add</span>
                    <svg class="w-3 h-3 ml-1 -mr-1 align-center" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button></span>

            <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                <div class="absolute right-0 w-56 mt-8 origin-top-right bg-indigo-500 divide-y divide-gray-100 rounded-md shadow-lg outline-none border border-indigo-800" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                    <div class="py-1 divide-y divide-indigo-800">
                        <a href="../admin/add-users.php" tabindex="0" class="text-white flex justify-between w-full px-4 py-2 text-sm leading-5 hover:font-bold text-left" role="menuitem">Users</a>
                        <a href="../admin/add-books.php" tabindex="1" class="text-white flex justify-between w-full px-4 py-2 text-sm leading-5 hover:font-bold text-left" role="menuitem">Books</a>
                        <a href="../admin/admin-signup.php" tabindex="2" class="text-white flex justify-between w-full px-4 py-2 text-sm leading-5 hover:font-bold text-left" role="menuitem">Admins</a>
                    </div>
                </div>
            </div>
        </div>

        <a href="return-books.php">
            <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex hover:bg-indigo-500" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold">Return</span>
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
    <!-- TODO addd a table here -->
    <div class="w-full px-2">
        <?php
        if ($requests = fetchReq($conn)) {
        ?>

            <div class="table w-full p-2">
                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                                <div class="flex items-center justify-center">
                                    Book
                                </div>
                            </th>

                            <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                                <div class="flex items-center justify-center">
                                    Author
                                </div>
                            </th>

                            <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                                <div class="flex items-center justify-center">
                                    Publisher
                                </div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($request = mysqli_fetch_assoc($requests)) { ?>
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">


                                <td class="p-2 border-r"><?php echo $request['Book']; ?></td>
                                <td class="p-2 border-r"><?php echo $request['Author']; ?></td>
                                <td class="p-2 border-r"><?php echo $request['Publisher']; ?></td>
                                
                            </tr>
                    <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
    </div>

</div>
<style>
    .dropdown:hover .dropdown-menu {
        opacity: 1;
        transform: translate(0) scale(1);
        visibility: visible;
    }
</style>
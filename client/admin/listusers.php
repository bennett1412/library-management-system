<?php
include_once 'header.php';
include_once 'auth/admin-features.php';
include_once '../../server/db_connect.php';
?>
<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there,<?php echo $_SESSION["name"] ?></span>
    </div>
</div>

<?php
if ($users = listUsers($conn)) {
?>

    <div class="table w-full p-2">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            ID
                        </div>
                    </th>

                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            NAME
                        </div>
                    </th>

                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            EMAIL
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            MOBILE
                        </div>
                    </th>

                    <th class="p-2 border-r cursor-pointer text-sm  text-blue-800">
                        <div class="flex items-center justify-center">
                            STAFF
                        </div>
                    </th>


                </tr>
            </thead>
            <tbody>
                <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">


                        <td class="p-2 border-r"><?php echo $user['id']; ?></td>
                        <td class="p-2 border-r"><?php echo $user['name']; ?></td>
                        <td class="p-2 border-r"><?php echo $user['email']; ?></td>
                        <td class="p-2 border-r"><?php echo $user['mobile']; ?></td>
                        <td class="p-2 border-r"><?php echo ($user['staff'] == 1) ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a href="#" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                            <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "<div class='flex justify-center'>
    <div class = ' w-4/12 bg-white p-6 rounded-lg mt-5 text-red-600'>
    No books are there in the database!
    </div>
    </div>
    ";
}
?>
<?php
include_once 'footer.php';
?>
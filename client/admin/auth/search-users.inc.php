<?php
include_once 'admin-features.php';

if (isset($_POST['search'])) {
    $id = $_POST['search'];
    if ($user = searchUsers($conn, $id)) {


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

                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                        <td class="p-2 border-r"><?php echo $user['id']; ?></td>
                        <td class="p-2 border-r"><?php echo $user['name']; ?></td>
                        <td class="p-2 border-r"><?php echo $user['email']; ?></td>
                        <td class="p-2 border-r"><?php echo $user['mobile']; ?></td>
                        <td class="p-2 border-r"><?php echo  ($user['staff'] == 1)?'Yes':'No'; ?></td>

                        <td>
                            <a href="#" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                            <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
<?php
    } else {
        echo "<div class='flex justify-center'>
    <div class = ' w-4/12 bg-white p-6 rounded-lg mt-5 text-red-600'>
    No such user is exists!!,Please check id again
    </div>
    </div>
    ";
    }
} ?>
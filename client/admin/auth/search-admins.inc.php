<?php


if (isset($_POST['search'])) {
    $id = $_POST['id'];
    include_once 'admin-features.php';
    require_once '../../server/db_connect.php';
    if ($admin = searchAdmins($conn, $id)) {

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
                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                        <td class="p-2 border-r"><?php echo $admin['id']; ?></td>
                        <td class="p-2 border-r"><?php echo $admin['name']; ?></td>
                        <td class="p-2 border-r"><?php echo $admin['email']; ?></td>
                        <td class="p-2 border-r"><?php echo $admin['mobile']; ?></td>
                        <td>
                            <form action="auth/delete-admin.inc.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $admin['id'] ?>">
                                <input type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin" name="delete<?php echo $admin['id'] ?>" value="Delete" />
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
<?php
    } else {
        echo "<div class='flex justify-center'>
    <div class = ' w-4/12 bg-white p-6 rounded-lg mt-5 text-red-600'>
    No such admin exists!!,Please check id again
    </div>
    </div>
    ";
    }
} ?>
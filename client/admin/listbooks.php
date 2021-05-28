<?php
include_once 'header.php';
include_once '../../server/db_connect.php';
include_once 'auth/admin-features.php';

?>
<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there, <?php echo $_SESSION["name"] ?></span>
    </div>
</div>

<?php
if ($books = listBooks($conn)) {
?>
    <div class="table w-full p-2">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">

                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            BOOK NAME
                        </div>
                    </th>

                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            AUTHOR NAME
                        </div>
                    </th>

                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            PUBLISHER NAME
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm text-blue-800">
                        <div class="flex items-center justify-center">
                            CATEGORY NAME
                        </div>
                    </th>

                    <th class="p-2 border-r cursor-pointer text-sm  text-blue-800">
                        <div class="flex items-center justify-center">
                            COPIES
                        </div>
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php while ($book = mysqli_fetch_assoc($books)) { ?>
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                        <td class="p-2 border-r"><?php echo $book['BOOK_NAME']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['AUTHOR']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['PUBLISHER_NAME']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['CATEGORY_NAME']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['COPIES']; ?></td>

                        <td>
                            <!-- <a href="./edit-booklist.php" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a> -->
                            <!-- <a href="./delete-book.php" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin" onclick= delete>Remove</a> -->
                            <form action="auth/edit-booklist.inc.php" method="POST">
                                <input type="hidden" name="B_NO" value="<?php echo $book['B_NO']?>">
                                <input type="submit" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin" name="edit<?php echo $book['B_NO'] ?>" value="Edit" />
                            </form>
                            <form action="auth/delete-book.inc.php" method="POST">
                                <input type="hidden" name="B_NO" value="<?php echo $book['B_NO']?>"> 
                                <input  type="submit" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin" name="delete<?php echo $book['B_NO'] ?>" value="Delete" />
                            </form>
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
<script>
    function reloadPage() {
        location.reload();
        console.log("page reloaded");
        return false;
    }
</script>
<?php
include_once 'footer.php';
?>
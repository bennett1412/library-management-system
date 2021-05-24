<?php
include_once 'admin-features.php';

if (isset($_POST['search'])) {
    $name = $_POST['search'];
    if ($book = searchBooks($conn, $name)) {


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

                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                        <td class="p-2 border-r"><?php echo $book['BOOK_NAME']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['AUTHOR']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['PUBLISHER_NAME']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['CATEGORY_NAME']; ?></td>
                        <td class="p-2 border-r"><?php echo $book['COPIES']; ?></td>

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
    No such book is available!!,Please try another keyword
    </div>
    </div>
    ";
    }
} ?>
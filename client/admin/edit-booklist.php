<?php
include_once 'header.php';
?>

<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there, <?php echo $_SESSION["name"] ?></span>
    </div>
</div>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">
        <h4 class="">Update Book Details!</h4>
        <br>
        <form action="auth/edit-booklist.inc.php" method="POST" class="">
            <div class="mb-4">
                <label class="" for="book_name"> </label>
                <input type="book_name" name="book_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="book_name" aria-describedby="book_name">
            </div>
            <div class="mb-4">
                <label class="" for="author_name"></label>
                <input type="author_name" name="author_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="author_name" aria-describedby="author_name" >
            </div>
            <div class="mb-4">
                <label class="" for="publisher_name"> </label>
                <input type="publisher_name" name="publisher_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="publisher_name" aria-describedby="publisher_name" >
            </div>
            <div class="mb-4">
                <label class="" for="category_name"></label>
                <input type="category_name" name="category_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="category_name" aria-describedby="category_name" >
            </div>
            <div class="mb-4">
                <label class="" for="copies"></label>
                <input type="copies" name="copies" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="copies" aria-describedby="copies">
            </div>

            <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 bg-opacity-100 text-white font-bold py-2 px-4 rounded">Submit</button>
            <br>
            <div class="text-red-600 my-3 font-bold py-1 rounded">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Fill in all the Fields</p>";
                    }

                    if ($_GET["error"] == "stmtfailed") {
                        echo "Something went wrong. Please try again!!</p>";
                    }
                    if ($_GET["error"] == "none") {
                        echo "<p>Updated!!</p>";
                    }
                }
                ?>
            </div>
        </form>
    </div>
</div>
<?php
include_once 'footer.php';
?>

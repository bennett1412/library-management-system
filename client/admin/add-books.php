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
        <h4 class=""> Add A Book To The Library</h4>
        <br>
        <form action="auth/add-books.inc.php" method="POST" class="">

        <div class="mb-4">
                <label class="sr-only" for="ISBN">ISBN</label>
                <input type="ISBN" name="ISBN" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="ISBN" aria-describedby="ISBN" placeholder="ISBN">
            </div>

            <div class="mb-4">
                <label class="sr-only" for="book">Book</label>
                <input type="book" name="book" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="book" aria-describedby="book" placeholder="Book">
            </div>

            <div class="mb-4">
                <label class="sr-only" for="author">Author</label>
                <input type="author" name="author" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="author" aria-describedby="author" placeholder="Author">
            </div>

            <div class="mb-4">
                <label class="sr-only" for="Publisher">Name of Publisher </label>
                <input type="Publisher" name="Publisher" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Publisher" aria-describedby="Publisher" placeholder="Name of Publisher">
            </div>

            <div class="mb-4">
                <label class="sr-only" for="Category">Name of Category</label>
                <input type="Category" name="Category" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Category" aria-describedby="Category" placeholder="Name of Category">
            </div>

            <div class="mb-4">
                <label class="sr-only" for="Copies">Number of Copies</label>
                <input type="Copies" name="Copies" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Copies" aria-describedby="Copies" placeholder="Number of Copies">
            </div> 

            <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 bg-opacity-100 text-white font-bold py-2 px-4 rounded">Submit</button><br>
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
                        echo "<p>You have added a book to the database!</p>";
                    }
                }
                ?>
            </div>



<?php
include_once 'footer.php';
?>
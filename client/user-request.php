<?php
include_once 'header.php';
?>
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">
        <h4 class="">Make A Book Request!</h4>
        <br>
        <form action="auth/user-request.inc.php" method="POST" class="">
            <div class="mb-4">
                <label class="sr-only" for="book">Book</label>
                <input type="book" name="book" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="book" aria-describedby="book" placeholder="Book">

            </div>
            <div class="mb-4">
                <label class="sr-only" for="author">Author</label>
                <input type="author" name="author" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="author" aria-describedby="author" placeholder="Author">
            </div>
            <div class="mb-4">
                <label class="sr-only" for="publisher">Name</label>
                <input name="publisher" type="publisher" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="publisher" aria-describedby="publisher" placeholder="Publisher">
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
                        echo "<p class='text-green-600'>You have made a request!</p>";
                    }
                }
                ?>
            </div>



            <?php
            include_once 'footer.php';
            ?>
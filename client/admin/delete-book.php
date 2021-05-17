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
        <h4 class="">Enter The Book Number To Delete!</h4>
        <br>
        <form action="auth/delete-book.inc.php" method="POST" class="">
            <div class="mb-4">
                <label class="" for="bno"> </label>
                <input type="bno" name="bno" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="bno" aria-describedby="bno">
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
                        echo "<p>Deleted!!</p>";
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
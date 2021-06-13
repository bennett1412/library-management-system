<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">
        <h4 class="">Update Profile</h4>
        <br>
        <form action="auth/update.inc.php" method="POST" class="">
            <div class="mb-4">
                <label class="" for="Name">Name: </label>
                <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Email" aria-describedby="name" value='<?php echo $_SESSION["name"] ?>'>
            </div>
            <div class="mb-4">
                <label class="" for="Email">Email address: </label>
                <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Email" aria-describedby="email" value='<?php echo $_SESSION["email"] ?>'>
            </div>
            <div class="mb-4">
                <label class="" for="Mobile">Mobile: </label>
                <input type="text" name="mobile" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Mobile" aria-describedby="mobile" value='<?php echo $_SESSION["mobile"] ?>'>
            </div>
            <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 bg-opacity-100 text-white font-bold py-2 px-4 rounded">Submit</button>
            <br>
            <div class="text-red-600 my-3 font-bold py-1 rounded">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Fill in all the Fields</p>";
                    }

                    if ($_GET["error"] == "invalidemail") {
                        echo "<p>Please enter a valid email</p>";
                    }
                    if ($_GET["error"] == "invalidmobile") {
                        echo "<p>Invalid Mobile</p>";
                    }
                    if ($_GET["error"] == "stmtfailed") {
                        echo "Something went wrong. Please try again!!</p>";
                    }
                    if ($_GET["error"] == "emailexists") {
                        echo "This Email is already registerd!</p>";
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
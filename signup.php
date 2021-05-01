<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">
        <h4 class="">User Registeration Form</h4>
        <br>
        <form action="auth/signup.inc.php" method="POST" class="">
            <div class="mb-4">
                <label class="sr-only" for="name">Name</label>
                <input name="name" type="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="name" aria-describedby="name" placeholder="Name">
            </div>
            <div class="mb-4">
                <label class="sr-only" for="Email">Email address</label>
                <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Email" aria-describedby="email" placeholder="Email">

            </div>
            <div class="mb-4">
                <label class="sr-only" for="mobile">Mobile</label>
                <input type="mobile" name="mobile" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="mobile" aria-describedby="mobile" placeholder="Mobile">
            </div>
            <div class="mb-4">
                <label class="sr-only" for="password">Password</label>
                <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="password" placeholder="Password">
            </div>
            <div class="mb-4">
                <label class="sr-only" for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="password_confirmation" placeholder="Enter Password Again">
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

                    if ($_GET["error"] == "passwordsdontmatch") {
                        echo "<p> Fill in all the </p>";
                    }
                    if ($_GET["error"] == "stmtfailed") {
                        echo "Something went wrong. Please try again!!</p>";
                    }
                    if ($_GET["error"] == "none") {
                        echo "<p>You have signed up</p>";
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
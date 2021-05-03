<?php
include_once 'header.php';
?>
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">

        <h4 class="">Admin Login</h4>
        <br>
        <form action="auth/login.inc.admin.php" method="POST" class="">

            <div class="mb-4">
                <label class="sr-only" for="Email">Email address</label>
                <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Email" aria-describedby="email" placeholder="Email">
            </div>

            <div class="mb-4">
                <label class="sr-only" for="password">Password</label>
                <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="password" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 bg-opacity-100 text-white font-bold py-2 px-4 rounded">Submit</button>
            <br>
            <div class="text-red-600 my-3 font-bold py-1 rounded">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p> Fill in all the Fields</p>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<p>Invalid Email</p>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<p>Invalid Email</p>";
                    } else if ($_GET["error"] == "invalidpwd") {
                        echo "<p>Invalid password!!</p>";
                    }
                }
                ?>
            </div>
        </form>
        <?php
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == ["passwordupdated"]) {
                echo '<p class = "signupsuccess">Your password has been reest!</p>';
            }
        }
        ?>
        <a href="reset-password.php">Forgot your password? :(</a>
    </div>
</div>
<?php
include_once 'footer.php';
?>
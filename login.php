<?php
include_once 'header.php';
?>
    <div class="grid">
        <h4 class="">User Login</h4>
        <br>
        <form action="auth/login.inc.php" method="POST" class="border rounded border-2">

            <div class="form-group row">
                <label class="sr-only" for="Email">Email address</label>
                <input type="email" name="email" class="form-control" id="Email" aria-describedby="email" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            
            <div class="form-group row">
                <label class="sr-only" for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <br>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p> Fill in all the Fields</p>";
                }

                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Invalid Email</p>";
                }

                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Invalid Email</p>";
                } 
                else if ($_GET["error"] == "invalidpwd") {
                    echo "<p>Invalid password!!</p>";
                }
            }
            ?>
        </form>
    </div>
    </div>
<?php 
include_once 'footer.php';
?>
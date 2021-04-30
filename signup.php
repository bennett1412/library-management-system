<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="grid">
        <h4 class="">User Registeration Form</h4>
        <br>
        <form action="auth/signup.inc.php" method="POST" class="border rounded border-2">
            <div class="form-group row">
                <label class="sr-only" for="name">Name</label>
                <input name="name" type="name" class="form-control" id="name" aria-describedby="name" placeholder="Name">
            </div>
            <div class="form-group row">
                <label class="sr-only" for="Email">Email address</label>
                <input type="email" name="email" class="form-control" id="Email" aria-describedby="email" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group row">
                <label class="sr-only" for="mobile">Mobile</label>
                <input type="mobile" name="mobile" class="form-control" id="mobile" aria-describedby="mobile" placeholder="Mobile">
            </div>
            <div class="form-group row">
                <label class="sr-only" for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group row">
                <label class="sr-onlys" for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Password Again">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <br>
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
        </form>
    </div>
    </div>
</body>


</html>
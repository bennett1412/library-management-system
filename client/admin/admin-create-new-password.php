<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">

        <?php
        if (empty($_GET["selector"]) || empty("validator")) {
            echo "We could not validate your request!";
        } else {
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];
            // echo $_GET["validator"];

            if (ctype_xdigit($_GET["selector"]) !== false && ctype_xdigit($_GET["validator"]) !== false) {
        ?>

                <form action="auth/admin-reset-password.inc.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <input class="focus:outline-none focus:border-blue-500 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="password" name="pwd" , placeholder="Enter a new password!">
                    <input class="focus:outline-blue focus:border-blue-500 mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="password" name="pwd-repeat" , placeholder="Re-enter the new password!">
                    <button class="mt-3 bg-blue-600 hover:bg-blue-700 bg-opacity-100 text-white font-bold py-2 px-4 rounded" type="submit" name="reset-password-submit">Reset Password!</button>
                </form>
        <?php
            } else
                echo "something wrong";
        }
        ?>


    </div>
</div>
<?php
include_once 'footer.php';
?>
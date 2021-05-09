<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">
        <h4 class="">Reset Your Password!</h4><br>
        <p>We will send you an email with instructions to reset your password!</p>
        <br>
        <form action="reset-request.php" method="post">
            <input type="text" name="email" placeholder="Enter your e-mail ID "><br><br>
            <button class="bg-blue-600 hover:bg-blue-700 bg-opacity-100 text-white font-bold py-2 px-4 rounded" type="submit" name="reset-request-submit">Go!</button>

        </form>
        <?php
        if (isset($_GET["reset"])) {
            if ($_GET["reset"] == "success") {
                echo '<span class = " text-green-600 font-bold my-3 py-2 rounded"> Check your e-mail!</span>';
            }
        }
        ?>
    </div>
</div>
<?php
include_once 'footer.php';
?>
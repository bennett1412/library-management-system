<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">
        <h4 class="">Reset Your Password!</h4><br>
        <p>We will send you an email with instructions to reset your password!</p>
        <br>
        <form action = "reset-request.php" method = "post">
            <input type = "text" name = "email" placeholder = "Enter your e-mail ID "><br><br>
            <button type= "submit" name="reset-request-submit" >Go!</button>

        </form>
        <?php
            if(isset($_GET["reset"])) {
                if($_GET["reset"] == "success") {
                    echo '<p class = "signupsuccess"> Check your e-mail!</p>';
                }
            }
        ?>
    </div>
</div>
<?php
include_once 'footer.php';
?>  
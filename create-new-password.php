<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">

        <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if(empty($selector) || empty($validator)){
                echo "We could not validate your request!";
            }
            else{
                if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                    ?>

                    <form action = "library-management-system/rest-password.php" method="post">
                        <input type = "hidden" name = "selector" value = "<?php  echo $selector ?>">
                        <input type = "hidden" name = "selector" value = "<?php  echo $validator ?>">
                        <input type = "password" name = "pwd" , placeholder = "Enter a new password!">
                        <input type = "password" name = "pwd-repeat" , placeholder = "Re-enter the new password!">
                        <button type = "submit" name = "reset-password-submit">Reset Password!</button> 
                    </form>
                    <?php
                }

            }
        ?>

        
    </div>
</div>
<?php
include_once 'footer.php';
?>  
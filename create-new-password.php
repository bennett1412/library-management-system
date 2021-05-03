<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg mt-5">

        <?php
            if (empty($_GET["selector"]) || empty("validator")) {
                echo "We could not validate your request!";
            }
            
            else{
            $selector = $_GET["selector"];
            $validator = $_GET["validator"]; 
            // echo $_GET["validator"];
          
                if(ctype_xdigit($_GET["selector"]) !== false && ctype_xdigit($_GET["validator"]) !== false){
                    ?>

                    <form action = "reset-password.inc.php" method="post">
                        <input type = "hidden" name = "selector" value = "<?php  echo $selector ?>">
                        <input type = "hidden" name = "validator" value = "<?php  echo $validator ?>">
                        <input type = "password" name = "pwd" , placeholder = "Enter a new password!">
                        <input type = "password" name = "pwd-repeat" , placeholder = "Re-enter the new password!">
                        <button type = "submit" name = "reset-password-submit">Reset Password!</button> 
                    </form>
                    <?php
                }
                else
                echo "something wrong";

            }
        ?>

        
    </div>
</div>
<?php
include_once 'footer.php';
?>  
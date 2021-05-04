<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    require_once "../../../server/db_connect.php";
    require_once "functions.inc.admin.php";

    if (emptyInputUpdate($name, $email, $mobile) !== false) {
        header("location: ../admin-update_profile.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../admin-update_profile.php?error=invalidemail");
        exit();
    }

    if (emailTaken($conn, $email) !== false) {
        header("location: ../admin-update_profile.php?error=emailexists");
        exit();
    }


    // TODO: add check for mobile nos 
    // if (invalidMobile($mobile) !== false) {
    //     header("location: ../signup.php?error=invalidmobile");
    //     exit();
    // }
    
    updateAdmin($conn, $name, $email, $mobile);
} 
else {
    header("location: ../admin-update_profile.php");
    exit();
    // echo 'something fishy';
}

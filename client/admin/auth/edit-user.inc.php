<?php

if (isset($_POST['submit'])) {
    $name = $_POST['user-name'];
    $email = $_POST['user-email'];
    $mobile = $_POST['user-mobile'];
    $id = $_POST['user-id'];
    require_once "../../../server/db_connect.php";
    require_once "functions.inc.admin.php";
    require_once "admin-features.php";
    // require_once "../../auth/functions.php";
    if (emptyInputUpdate($name, $email, $mobile) !== false) {
        header("location: ../admin-update-user-profile.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../admin-update-user-profile.php?error=invalidemail");
        exit();
    }

    if (userEmailTaken($conn, $email,$id) !== false) {
        header("location: ../admin-update-user-profile.php?error=emailexists");
        exit();
    }


    // TODO: add check for mobile nos 
    // if (invalidMobile($mobile) !== false) {
    //     header("location: ../signup.php?error=invalidmobile");
    //     exit();
    // }

    updateUser($conn,$name,$email,$mobile,$id);
    
    
} else {
    header("location: ../admin-update-user-profile.php");
    exit();
    // echo 'something fishy';
}

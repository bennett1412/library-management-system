<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "../../../server/db_connect.php";
    require_once "functions.inc.admin.php";
    
    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../../admin-login.php?error=emptyinput");
        exit();
    }  

    loginAdmin($conn,$email,$password);
}

else{
    header("location: ../admin-login.php");
    exit();
}
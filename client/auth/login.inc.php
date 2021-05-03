<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "../../server/db_connect.php";
    require_once "functions.php";
    
    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../../login.php?error=emptyinput");
        exit();
    }  

    loginUser($conn,$email,$password);
}

else{
    header("location: ../login.php");
    exit();
}
<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "../db_connect.php";
    require_once "signup_functions.php";
    
    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../../login.php?error=emptyinput");
        exit();
    }  

    loginUser($conn,$email,$password);
}

else{
    header("location: ../login.php")
}
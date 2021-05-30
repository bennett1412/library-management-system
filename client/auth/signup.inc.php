<?php 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    require_once '../../server/db_connect.php';
    require_once 'functions.php';

    if(emptyInputSignup($name,$email,$mobile,$password,$password_confirmation) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailexists");
        exit();
    }

    // TODO: add check for mobile nos 
    // if (invalidMobile($mobile) !== false) {
    //     header("location: ../signup.php?error=invalidmobile");
    //     exit();
    // }

    if (pwdMatch($password,$password_confirmation) !== false) {
        header("location: ../../signup.php?error=passwordsdontmatch");
        exit();
    }

    createUser($conn, $name, $email,$password, $mobile);
    header("location: ../login.php?error=none");
    exit();
}

else{
    header("location: ../signup.php");
    exit();
    // echo 'something fishy';
}
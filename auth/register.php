<?php 

if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    require_once 'db_connect.php';
    require_once 'auth/signup_functions.php';

    if(emptyInputSignup($name,$email,$mobile,$password,$password_confirmation) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../index.php?error=invalidemail");
        exit();
    }

    if (invalidMobile($mobile) !== false) {
        header("location: ../index.php?error=invalidmobile");
        exit();
    }

    if (invalidPassword($password,$password_confirmation) !== false) {
        header("location: ../index.php?error=passwordsdontmatch");
        exit();
    }

    createUser($conn, $name, $email, $mobile, $password);
}

else{
    header("location: ../index.php");
    exit();
    // echo 'something fishy';
}
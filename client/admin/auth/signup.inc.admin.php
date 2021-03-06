<?php 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    require_once "../../../server/db_connect.php";
    require_once "functions.inc.admin.php";

    if(emptyInputSignup($name,$email,$mobile,$password,$password_confirmation) !== false){
        header("location: ../admin-signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../admin-signup.php?error=invalidemail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../admin-signup.php?error=emailexists");
        exit();
    }

    if (invalidMobile($mobile) !== false) {
        header("location: ../admin-signup.php?error=invalidmobile");
        exit();
    }

    if (invalidPw($password) !== false) {
        header("location: ../admin-signup.php?error=invalidpassword");
        exit();
    }

    if (pwdMatch($password,$password_confirmation) !== false) {
        header("location: ../admin-signup.php?error=passwordsdontmatch");
        exit();
    }

    createAdmin($conn, $name, $email,$password, $mobile);
}

else{
    header("location: ../admin-signup.php");
    exit();
    // echo 'something fishy';
}
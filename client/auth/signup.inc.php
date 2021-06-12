<?php 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $reg_no = $_POST['reg_no'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    if (isset($_POST['staff'])) {
        $staff = $_POST['staff'];
    } else {
        $staff = 0;
    }
    require_once '../../server/db_connect.php';
    require_once 'functions.php';

    if(emptyInputSignup($name,$reg_no,$email,$mobile,$password,$password_confirmation) !== false){
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

    if (invalidMobile($mobile) === true) {
         header("location: ../signup.php?error=invalidmobile");
        exit();
    }
    
    if (invalidPw($password) !== false) {
        header("location: ../signup.php?error=invalidpassword");
        exit();
    }
   
    if (pwdMatch($password,$password_confirmation) !== false) {
        header("location: ../../signup.php?error=passwordsdontmatch");
        exit();
    }

    createUser($conn, $name, $email,$password, $mobile,$staff,$reg_no);
    header("location: ../login.php?error=none");
    exit();
}

else{
    header("location: ../signup.php");
    exit();
}
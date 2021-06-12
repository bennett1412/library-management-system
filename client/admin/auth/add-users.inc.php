<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    if(isset($_POST['staff'])){
    $staff = $_POST['staff'];
    }
    else {
        $staff = 0;
    }
    require_once '../../../server/db_connect.php';
    require_once '../../auth/functions.php';
//update this function for reg
    if (emptyInputSignup($name,$reg_no, $email, $mobile, $password, $password_confirmation) !== false) {
        header("location: ../add-users.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../add-users.php?error=invalidemail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../add-users.php?error=emailexists");
        exit();
    }

    if (invalidMobile($mobile) !== false) {
        header("location: ../add-users.php?error=invalidmobile");
        exit();
    }

    if (invalidPw($password) !== false) {
        header("location: ../add-users.php?error=invalidpassword");
        exit();
    }
    if (pwdMatch($password, $password_confirmation) !== false) {
        header("location: ../../add-users.php?error=passwordsdontmatch");
        exit();
    }

    createUser($conn, $name, $email, $password, $mobile,$staff,$reg_no);
    header("location: ../admin-dashboard.php?error=none");
    exit();
} else {
    header("location: ../admin-dashboard.php");
    exit();
    // echo 'something fishy';
}

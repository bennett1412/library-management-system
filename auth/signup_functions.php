<?php

function emptyInputSignup($name,$email,$mobile,$password,$password_confirmation){
    $result;
    if (empty($name) ||empty($email) ||empty($mobile) ||empty($password) || empty($password_confirmation)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) { 
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password,$password_confirmation)
{
    $result;
    if ($password !== $password_confirmation) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailExists($conn,$email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s",$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row; 
    }
    else {
        $result = false;
        return $result; 
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password,$mobile)
{
    $sql = "INSERT INTO users (name,email,password,mobile) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../signup.php?error=stmtfailed");
        exit();
     }
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashedPwd ,$mobile);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
   
    header("location: ../login.php?error=none");
    exit();
}

function emptyInputLogin($email, $password)
{
    $result;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email,$password){
    $emailExists = emailExists($conn,$email);

    if($emailExists === false){
        header("location: ../login.php?error=invalidemail");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($password,$pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=invalidpwd");
    }

    else if($checkPwd == true){
        session_start();
        $_SESSION["id"] = $emailExists["id"];
        $_SESSION["email"] = $emailExists["email"];
        $_SESSION["name"] = $emailExists["name"];
        $_SESSION["mobile"] = $emailExists["mobile"];
        header("location: ../dashboard.php");
        exit();
        
    }
}
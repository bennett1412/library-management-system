<?php
//signup functions


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
//login functions
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

//update user profile functions
function emailTaken($conn, $email) //to omit the current email from the check
                                      
{
    session_start();
    $sql = "SELECT * FROM users WHERE email = ? AND id != ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../update_profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email,$_SESSION["id"]);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function grabUser($conn){
    session_start();
    $sql = "SELECT * FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=somethingwentwrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function emptyInputUpdate($email, $name,$mobile)
{
    $result;
    if (empty($email) || empty($name)|| empty($mobile)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function updateUser($conn, $name, $email, $mobile)
{
    $sql = 'UPDATE users SET name = ?, email = ?, mobile = ? WHERE id = ?;';
    $stmt = mysqli_stmt_init($conn);
    session_start();
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);// error from the prepared stmt
        header("location: ../update_profile.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $mobile,$_SESSION["id"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $updatedUser = grabUser($conn);
    $_SESSION["email"] = $updatedUser["email"];
    $_SESSION["name"] = $updatedUser["name"];
    $_SESSION["mobile"] = $updatedUser["mobile"];
    // echo($_SESSION["name"]);
    // die($_SESSION["id"]);
    header("location: ../update_profile.php?error=none");
    exit();
}

//user book request functions
function emptyInputRequest($name,$book,$author)
{
    $result;
    if (empty($name) || empty($book) || empty($author)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createBookRequest($conn, $name, $book, $author)
{
    $sql = "INSERT INTO requests (name,book,author) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../user-request.php?error=stmtfailed");
        exit();
     }
    mysqli_stmt_bind_param($stmt, "sss", $name, $book, $author);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
   
    header("location: ../user-request.php?error=none");
    exit();
}
?>
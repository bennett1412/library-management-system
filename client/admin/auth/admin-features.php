<?php

//require_once "../../server/db_connect.php";

function getUserCount($conn){
    $sql = "SELECT count(id) FROM users;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-signup.php?error=stmtfailed");
        exit();
    }

   // mysqli_stmt_bind_param($stmt, "s", $email);
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

function getBookCount($conn)
{
    $sql = "SELECT count(B_NO) FROM books;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-signup.php?error=stmtfailed");
        exit();
    }

    // mysqli_stmt_bind_param($stmt, "s", $email);
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

//list of all books
function listBooks($conn)
{

    $sql = "SELECT * FROM books;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../listbooks.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    return $resultData;
    mysqli_stmt_close($stmt);
}
//search for books

function searchBooks($conn,$name){
   
    $qname = '%'.$name.'%';
    $sql = "SELECT * FROM books WHERE BOOK_NAME LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../search-books.php?error=$er_msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $qname);
    
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

//list users
function listUsers($conn)
{

    $sql = "SELECT id,name,email,mobile,staff FROM users;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../listusers.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    return $resultData;
    mysqli_stmt_close($stmt);
}
//search for users

function searchUsers($conn, $id)
{

    $sql = "SELECT id,name,email,mobile,staff FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../search-users.php?error=$er_msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

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
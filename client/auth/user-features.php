<?php

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

//get number of books issued


function getIssueCount($conn,$u_id)
{
    $sql = "SELECT count(issue_id) FROM issues WHERE borrower = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $result = false;
        return $result;
    }
    mysqli_stmt_bind_param($stmt, "i", $u_id);
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

//list of books in the sys

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

// search for a book by name

function searchBooks($conn, $name)
{

    $qname = '%' . $name . '%';
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

    if ($resultData) {
        return $resultData;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//list of books issued

function listIssues($conn, $user_id)
{
    $sql = "SELECT * FROM issues WHERE BORROWER = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../listbooks.php?error=$er_msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    return $resultData;
    mysqli_stmt_close($stmt);
}

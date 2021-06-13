<?php

     $bno = $_POST['B_NO'];

    require_once "../../../server/db_connect.php";
    require_once "admin-features.php";

    if (emptyInputDelete($bno) !== false) {
        header("location: ../delete-book.php?error=emptyinput");
        exit();
    }
if (array_key_exists("delete" . $bno, $_POST)) {
    deleteBook($conn, $bno);
    header("location: ../listbooks.php");
} 
else {
    header("location: ../listbooks.php");
    exit();
    // echo 'something fishy';
}

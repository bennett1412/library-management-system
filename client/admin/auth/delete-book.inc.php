<?php

if (isset($_POST['submit'])) {
    $bno = $_POST['bno'];

    require_once "../../../server/db_connect.php";
    require_once "./admin-features.php";

    if (emptyInputDelete($bno) !== false) {
        header("location: ../delete-book.php?error=emptyinput");
        exit();
    }

    deleteBook($conn,$bno);
} 
else {
    header("location: ../delete-book.php");
    exit();
    // echo 'something fishy';
}

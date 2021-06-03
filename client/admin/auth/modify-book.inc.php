<?php

$b_no = $_POST['B_NO'];

require_once "../../../server/db_connect.php";
require_once "admin-features.php";

// if (emptyInputUserDelete($id) !== false) {
//     header("location: ../listusers.php?error=emptyinput");
//     exit();
// }

if (array_key_exists("delete" . $b_no, $_POST)) {
    deleteBook($conn, $b_no);
    header("location: ../listbooks.php");
} else if (array_key_exists("edit" . $b_no, $_POST)) {
    
    session_start();
    $book = grabBook($conn,$b_no);
    $_SESSION['book_name'] = $book['BOOK_NAME'];
    $_SESSION['author_name'] = $book['AUTHOR'];
    $_SESSION['publisher_name'] = $book['PUBLISHER_NAME'];
    $_SESSION['category_name'] = $book['CATEGORY_NAME'];
    $_SESSION['copies'] = $book['COPIES'];
    $_SESSION['b_no'] = $book['B_NO'];
     header("location: ../edit-booklist.php");
} else {
    header("location: ../listbooks.php");
    exit();
    // echo 'something fishy';
}

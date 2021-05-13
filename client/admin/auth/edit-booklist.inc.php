<?php

if (isset($_POST['submit'])) {
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $publisher_name = $_POST['publisher_name'];
    $category_name = $_POST['category_name'];
    $copies = $_POST['copies'];

    require_once "../../../server/db_connect.php";
    require_once "./admin-features.php";

    if (emptyInputEdit($book_name,$author_name,$publisher_name,$category_name,$copies) !== false) {
        header("location: ../edit-booklist.php?error=emptyinput");
        exit();
    }

    updateBook($conn,$book_name,$author_name,$publisher_name,$category_name,$copies);
} 
else {
    header("location: ../edit-booklist.php");
    exit();
    // echo 'something fishy';
}

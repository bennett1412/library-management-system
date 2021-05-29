<?php

if (isset($_POST['submit'])) {
    $admin_id = $_POST['admin-id'];
    $book_id = $_POST['book-id'];
    $user_id = $_POST['user-id'];    
    require_once '../../../server/db_connect.php';
    require_once '../auth/admin-features.php';

    if (emptyIssueForm($book_id,$user_id) !== false) {
        header("location: ../issue-book.php?error=emptyinput");
        exit();
    }

    if (bookExists($conn,$book_id) === false) {
        header("location: ../issue-book.php?error=invalid-book-id");
        exit();
    }

    if (grabUser($conn, $user_id) === false) {
        header("location: ../issue-book.php?error=invalid-user-id");
        exit();
    }

    issueBook($conn,$user_id,$book_id,$admin_id);


} else {
    header("location: ../add-books.php");
    exit();
    // echo 'something fishy';
}

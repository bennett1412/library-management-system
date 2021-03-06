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
    $user = grabUser($conn, $user_id);
    if ($user === false) {
        header("location: ../issue-book.php?error=invalid-user-id");
        exit();
    }
    else
    if ($user['staff'] == 0) {
        if(booksIssued($conn,$user_id) >= 3)
        {
            header("location: ../issue-book.php?error=quotafull");
            exit();
        }
    }

    issueBook($conn,$user_id,$book_id,$admin_id);


} else {
    header("location: ../add-books.php");
    exit();
    // echo 'something fishy';
}

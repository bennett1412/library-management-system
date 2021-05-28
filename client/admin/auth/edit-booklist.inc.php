<?php
    if(isset($_POST['submit'])){
        $B_NO = $_POST['B_NO'];
        $BOOK_NAME = $_POST['book_name'];
        $AUTHOR = $_POST['author_name'];
        $PUBLISHER_NAME = $_POST['publisher_name'];
        $CATEGORY_NAME = $_POST['category_name'];
        $COPIES = $_POST['copies'];

        require_once "../../../server/db_connect.php";
        require_once "./admin-features.php";

        if (emptyInputDelete($bno) !== false) {
            header("location: ../edit-booklist.php?error=emptyinput");
            exit();
        }

         if (emptyInputEdit($book_name,$author_name,$publisher_name,$category_name,$copies) !== false) {
             header("location: ../edit-booklist.php?error=emptyinput");
             exit();
        }

        else if(array_key_exists("edit".$bno, $_POST)){
            session_start();
            $user = grabBook($conn,$bno);
            $_SESSION['book_name'] = $user['BOOK_NAME'];
            $_SESSION['author_name'] = $user['AUTHOR'];
            $_SESSION['publisher_name'] = $user['PUBLISHER_NAME'];
            $_SESSION['category_name'] = $user['CATEGORY_NAME'];
            $_SESSION['copies'] = $user['COPIES'];
            $_SESSION['B_NO'] = $user['B_NO'];
            header("location: ../listbooks.php");
        }


    //updateBook($conn,$bno,$book_name,$author_name,$publisher_name,$category_name,$copies);
    updateBook($conn, $B_NO,$BOOK_NAME,$AUTHOR,$PUBLISHER_NAME,$CATEGORY_NAME,$COPIES);
} else  {
    header("location: ../edit-booklist.php");
    exit();
    // echo 'something fishy';
}

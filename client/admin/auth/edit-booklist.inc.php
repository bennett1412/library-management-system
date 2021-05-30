<?php
    if(isset($_POST['submit'])){
        $B_NO = $_POST['b_no'];
        $BOOK_NAME = $_POST['book_name'];
        $AUTHOR = $_POST['author_name'];
        $PUBLISHER_NAME = $_POST['publisher_name'];
        $CATEGORY_NAME = $_POST['category_name'];
        $COPIES = $_POST['copies'];

        require_once "../../../server/db_connect.php";
        require_once "./admin-features.php";

      
        if (emptyInputEdit($BOOK_NAME,$AUTHOR,$PUBLISHER_NAME,$CATEGORY_NAME,$COPIES) !== false) {
            header("location: ../edit-booklist.php?error=emptyinput");
            exit();
    }

    //updateBook($conn,$bno,$book_name,$author_name,$publisher_name,$category_name,$copies);
    updateBook($conn,$B_NO,$BOOK_NAME,$AUTHOR,$PUBLISHER_NAME,$CATEGORY_NAME,$COPIES);
} else  {
    header("location: ../edit-booklist.php");
    exit();
    // echo 'something fishy';
}

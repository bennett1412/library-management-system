<?php

$i_id = $_POST['issue-id'];

require_once "../../../server/db_connect.php";
require_once "admin-features.php";

if (array_key_exists("issue" . $i_id, $_POST)) {
    //code to return a book
    returnBook($conn,$i_id);
    header('location: ../return-books.php');
} else {
    header("location: ../return-books.php");
    exit();
    // echo 'something fishy';
}

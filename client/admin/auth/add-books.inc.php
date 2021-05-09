<?php 

if(isset($_POST['submit'])){
    $ISBN = $_POST['ISBN'];
    $book = $_POST['book'];
    $author = $_POST['author'];
    $Publisher = $_POST['Publisher'];
    $Category = $_POST['Category'];
    $Copies = $_POST['Copies'];

    require_once '../../../server/db_connect.php';
    require_once '../auth/admin-features.php';

    if(emptyInputAdd($ISBN,$book,$author,$Publisher,$Category,$Copies) !== false){
        header("location: ../add-books.php?error=emptyinput");
        exit();
    }

    addBook($conn,$ISBN,$book,$author,$Publisher,$Category,$Copies);

}

else{
    header("location: ../add-books.php");
    exit();
    // echo 'something fishy';
}
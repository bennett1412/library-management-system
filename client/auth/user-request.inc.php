<?php 

if(isset($_POST['submit'])){
    $publisher = $_POST['publisher'];
    $book = $_POST['book'];
    $author = $_POST['author'];

    require_once '../../server/db_connect.php';
    require_once 'functions.php';

    if(emptyInputRequest($publisher,$book,$author) !== false){
        header("location: ../user-request.php?error=emptyinput");
        exit();
    }

    createBookRequest($conn,$publisher,$book,$author);

}

else{
    header("location: ../user-request.php");
    exit();
    // echo 'something fishy';
}
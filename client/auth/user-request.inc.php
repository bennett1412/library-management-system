<?php 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $book = $_POST['book'];
    $author = $_POST['author'];

    require_once '../../server/db_connect.php';
    require_once 'functions.php';

    if(emptyInputRequest($name,$book,$author) !== false){
        header("location: ../user-request.php?error=emptyinput");
        exit();
    }

    createBookRequest($conn,$name,$book,$author);

}

else{
    header("location: ../user-request.php");
    exit();
    // echo 'something fishy';
}
<?php



function getUserCount($conn){
    $sql = "SELECT count(id) FROM users;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-signup.php?error=stmtfailed");
        exit();
    }

   // mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function getBookCount($conn)
{
    $sql = "SELECT count(B_NO) FROM books;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin-signup.php?error=stmtfailed");
        exit();
    }

    // mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//list of all books
function listBooks($conn)
{

    $sql = "SELECT * FROM books;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../listbooks.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    return $resultData;
    mysqli_stmt_close($stmt);
}
//search for books

function searchBooks($conn,$name){
   
    $qname = '%'.$name.'%';
    $sql = "SELECT * FROM books WHERE BOOK_NAME LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../search-books.php?error=$er_msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $qname);
    
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//admin book adding, removing and editing functions

function emptyInputAdd($ISBN,$book,$author,$Publisher,$Category,$Copies)
{
    $result;
    if (empty($ISBN) || empty($book) || empty($author) || empty($Publisher) || empty($Category) || empty($Copies)  ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function addBook($conn,$ISBN,$book,$author,$Publisher,$Category,$Copies)
{
    $sql = "INSERT INTO books (ISBN,BOOK_NAME,AUTHOR,PUBLISHER_NAME,CATEGORY_NAME,COPIES) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../admin/add-books.php?error=$er_msg");
        exit();
     }
    mysqli_stmt_bind_param($stmt, "ssssss",$ISBN,$book,$author,$Publisher,$Category,$Copies);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
   
    header("location: ../../admin/add-books.php?error=none");
    exit();

}

function emptyInputEdit($book_name,$author_name,$publisher_name,$category_name,$copies){
    $result;
    if (empty($book_name) || empty($author_name) || empty($publisher_name) || empty($category_name) || empty($copies)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function grabBook($conn){
    session_start();
    $sql = "SELECT * FROM books WHERE B_NO = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-booklist.php?error=somethingwentwrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $_SESSION["B_NO"]);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function updateBook($conn,$book_name,$author_name,$publisher_name,$category_name,$copies){
    $sql = 'UPDATE books SET BOOK_NAME = ?, AUTHOR = ?, PUBLISHER_NAME = ?, CATEGORY_NAME= ?, COPIES = ? WHERE B_NO = ?;';
    $stmt = mysqli_stmt_init($conn);
    session_start();
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);// error from the prepared stmt
        header("location: ../edit-booklist.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssi", $book_name,$author_name,$publisher_name,$category_name,$copies,$_SESSION["B_NO"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $updatedAdmin = grabBook($conn);
    $_SESSION["book_name"] = $updatedAdmin["book_name"];
    $_SESSION["author_name"] = $updatedAdmin["author_name"];
    $_SESSION["publisher_name"] = $updatedAdmin["publisher_name"];
    $_SESSION["category_name"] = $updatedAdmin["category_name"];
    $_SESSION["copies"] = $updatedAdmin["copies"];
    // echo($_SESSION["name"]);
    // die($_SESSION["id"]);
    header("location: ../edit-booklist.php?error=none");
    exit();
}

function emptyInputDelete($bno){
    $result;
    if (empty($bno)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;

}

function deleteBook($conn,$bno){
    $sql = "DELETE FROM books WHERE B_NO = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../admin/listbooks.php?error=$er_msg");
        exit();
     }
    mysqli_stmt_bind_param($stmt, "i",$bno);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
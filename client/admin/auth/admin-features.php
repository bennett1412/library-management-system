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

//add book form empty check
function emptyInputAdd($ISBN, $book, $author, $Publisher, $Category, $Copies)
{
    $result;
    if (empty($ISBN) || empty($book) || empty($author) || empty($Publisher) || empty($Category) || empty($Copies)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// add a book to the db
function addBook($conn, $ISBN, $book, $author, $Publisher, $Category, $Copies,$Available_copies)
{
    $sql = "INSERT INTO books (ISBN,BOOK_NAME,AUTHOR,PUBLISHER_NAME,CATEGORY_NAME,COPIES,AVAILABLE_COPIES) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../admin/add-books.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $ISBN, $book, $author, $Publisher, $Category, $Copies,$Available_copies);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../../admin/add-books.php?error=none");
    exit();
}

// edit book form empty check
function emptyInputEdit($book_name, $author_name, $publisher_name, $category_name, $copies)
{
    $result;
    if (empty($book_name) || empty($author_name) || empty($publisher_name) || empty($category_name) || empty($copies)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// select a book by b_no
function grabBook($conn)
{
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

// update a book
function updateBook($conn, $book_name, $author_name, $publisher_name, $category_name, $copies)
{
    $sql = 'UPDATE books SET BOOK_NAME = ?, AUTHOR = ?, PUBLISHER_NAME = ?, CATEGORY_NAME= ?, COPIES = ? WHERE B_NO = ?;';
    $stmt = mysqli_stmt_init($conn);
    session_start();
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt); // error from the prepared stmt
        header("location: ../edit-booklist.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssi", $book_name, $author_name, $publisher_name, $category_name, $copies, $_SESSION["B_NO"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $updatedbook = grabBook($conn);
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

//empty form (this is not needed anymore)
function emptyInputDelete($bno)
{
    $result;
    if (empty($bno)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//function to delete the book
function deleteBook($conn, $bno)
{
    $sql = "DELETE FROM books WHERE B_NO = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../admin/listbooks.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $bno);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//to select a user from db
function grabUser($conn,$id)
{
    
    $sql = "SELECT * FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=somethingwentwrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
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

//list users
function listUsers($conn)
{

    $sql = "SELECT id,name,email,mobile,staff FROM users;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../listusers.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    return $resultData;
    mysqli_stmt_close($stmt);
}
//search for users

function searchUsers($conn, $id)
{

    $sql = "SELECT id,name,email,mobile,staff FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../search-users.php?error=$er_msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
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

//function to delete the book
function deleteUser($conn, $id)
{
    $sql = "DELETE FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../admin/listusers.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function emptyInputUserDelete($id)
{
    $result;
    if (empty($id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//to check if the user-email is taken or not
function userEmailTaken($conn, $email,$id) //to omit the current email from the check
                                      
{
    session_start();
    $sql = "SELECT * FROM users WHERE email = ? AND id != ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../update_profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email,$id);
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

//update-user 

function updateUser($conn, $name, $email, $mobile,$id)
{
    $sql = 'UPDATE users SET name = ?, email = ?, mobile = ? WHERE id = ?;';
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt); // error from the prepared stmt
        header("location: ../update_profile.php?error=$er_msg");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $mobile, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    unset($_SESSION['user-name']);
    unset($_SESSION['user-email']);
    unset($_SESSION['user-mobile']);
    header("location: ../listusers.php?error=none");
    exit();
}

//issue book

// empty issue form 
function emptyIssueForm($book_id,$user_id)
{
    $result;
    if (empty($book_id) || empty($user_id)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//bookexists

function bookExists($conn,$book_id){

    $sql = "SELECT * FROM books WHERE B_NO = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../issue-book.php?error=somethingwentwrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $book_id);
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

// issue book function

function issueBook($conn,$u_id,$b_id,$a_id){
    $sql = "INSERT INTO issues (b_no,borrower,issuer,date_of_issue,date_of_return) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $er_msg = mysqli_stmt_error($stmt);
        header("location: ../../admin/issue-book.php?error=$er_msg");
        exit();
    }

    $i_date = date('Y-m-d');
    $r_date = date('Y-m-d',strtotime($i_date . '+2 weeks' ));
    echo $u_id;
    echo $b_id;
    echo $a_id;
    echo $i_date; 
    echo $r_date;

    mysqli_stmt_bind_param($stmt, "iiiss", $b_id,$u_id,$a_id,$i_date,$r_date);
    mysqli_stmt_execute($stmt);
    echo mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);

    // header("location: ../../admin/issue-book.php?error=none");
    exit();   
}
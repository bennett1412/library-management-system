<?php

$id = $_POST['id'];

require_once "../../../server/db_connect.php";
require_once "admin-features.php";

if (emptyInputUserDelete($id) !== false) {
    header("location: ../listusers.php?error=emptyinput");
    exit();
}
if (array_key_exists("delete" . $id, $_POST)) {
    deleteUser($conn, $id);
    header("location: ../listusers.php");
} else if(array_key_exists("edit".$id, $_POST)){
    session_start();
    $user = grabUser($conn,$id);
    $_SESSION['user-name'] = $user['name'];
    $_SESSION['user-email'] = $user['email'];
    $_SESSION['user-mobile'] = $user['mobile'];
    $_SESSION['user-id'] = $user['id'];
    $_SESSION['user-reg'] = $user['reg_no'];

    header("location: ../admin-update-user-profile.php");
}
else {
    header("location: ../listusers.php");
    exit();
    // echo 'something fishy';
}

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
} else {
    header("location: ../listusers.php");
    exit();
    // echo 'something fishy';
}

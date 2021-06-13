<?php

$id = $_POST['id'];

require_once "../../../server/db_connect.php";
require_once "admin-features.php";

if (array_key_exists("delete" . $id, $_POST)) {
    deleteAdmin($conn,$id);
} else {
    header("location: ../search-admins.php");
    exit();
    // echo 'something fishy';
}

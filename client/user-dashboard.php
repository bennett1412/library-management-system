<?php
include_once 'header.php';

include_once 'auth/user-features.php';
if (isset($_SESSION["id"])) {
    require_once 'auth/dashboard.inc.php';
}
?>

<?php
include_once 'footer.php';
?>
<?php
include_once 'header.php';
?>
<?php
if (isset($_SESSION["id"])) {
    echo '<p>Hello, ' . $_SESSION["name"] . '</p>';
}
?>
<?php
include_once 'footer.php';
?>
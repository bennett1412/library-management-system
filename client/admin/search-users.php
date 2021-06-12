<?php
include_once 'header.php';
?>
<div class="flex justify-between bg-indigo-900 py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">LibMe:</span>
        <span class="font-semibold mr-2 text-left flex-auto">Hey there,<?php echo $_SESSION["name"] ?></span>
    </div>
    <div>
        <form class="" action="" method="POST">
            <input class="rounded-full px-3 py-1" type="text" placeholder="Enter the reg number" name="reg_no">&nbsp;
            <input class="rounded-full bg-blue-600 px-3 py-1 hover:bg-blue-700 text-white" type="submit" value="Search" name="search">
        </form>
    </div>
</div>

<div>
    <?php
    include_once 'auth/search-users.inc.php';
    ?>
</div>
<?php
include_once 'footer.php';
?>
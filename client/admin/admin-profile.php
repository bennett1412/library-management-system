<?php
include_once 'header.php';
?>

<div class="flex justify-center">
    <form class="w-4/12 bg-white p-6 rounded-lg mt-5">
        <div class="mb-4">
            <label class="" for="Email">Name: </label>
            <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Email" aria-describedby="email" value='<?php echo $_SESSION["name"] ?>' disabled>
        </div>
        <div class="mb-4">
            <label class="" for="Email">Email address: </label>
            <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Email" aria-describedby="email" value='<?php echo $_SESSION["email"] ?>' disabled>
        </div>
        <div class="mb-4">
            <label class="" for="Email">Mobile: </label>
            <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="Email" aria-describedby="email" value=' <?php echo $_SESSION["mobile"] ?>' disabled>
        </div>
    </form>
</div>


<?php
include_once 'footer.php';
?>
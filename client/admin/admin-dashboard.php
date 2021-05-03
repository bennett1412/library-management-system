<?php
include_once 'header.php';
?>
<?php
if (isset($_SESSION["id"])) {
    echo '<p>Hello, ' . $_SESSION["name"] . '</p>';
    
}
?>

<div class="grid grid-cols-3">
    <div class=" bg-white p-6 rounded-lg mt-5 mx-5">
        <div class="bg-blue-500 border rounded w-full py-2 px-3 text-white bold">
            Heading
        </div>
        <div class="" style="width: 300px">

        </div>
    </div>

    <div class="bg-white p-6 rounded-lg mt-5 mx-5">
        <div class="bg-green-500 border rounded w-full py-2 px-3 text-white bold">
            Heading
        </div>
        <div class="" style="width: 300px">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sunt excepturi, nisi provident qui dolorem sit velit commodi eum ex aut, nostrum ullam labore eius officiis nam eos quos officia.
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg mt-5 mx-5">
        <div class="bg-purple-500 border rounded w-full py-2 px-3 text-white bold">
            Heading
        </div>
        <div class="" style="width: 300px">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sunt excepturi, nisi provident qui dolorem sit velit commodi eum ex aut, nostrum ullam labore eius officiis nam eos quos officia.
        </div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-lg mt-5 mx-5 justify-center">
        <div class="text-center bg-indigo-500 border rounded w-full py-2 px-3 text-white bold">
            Heading
        </div>
        <div class="w-full" >
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sunt excepturi, nisi provident qui dolorem sit velit commodi eum ex aut, nostrum ullam labore eius officiis nam eos quos officia.
        </div>
    
</div>
    <?php
    include_once 'footer.php';

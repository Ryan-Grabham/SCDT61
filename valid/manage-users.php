<?php 

$title = "Login Page";
require __DIR__ . "/inc/header.php";

if (isset($_SESSION["logged_in"])) {
    if ($_SESSION["logged_in"]["roleid"] != 1) {
        redirect('index');
    }
}
?>

<section class="vh-100 text-center">
    <div class="container py-5 h-75">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <?php require __DIR__ . "/components/user-table.php"; ?>
        </div>
    </div>
</section>



<?php require __DIR__ . "/inc/footer.php"; ?>

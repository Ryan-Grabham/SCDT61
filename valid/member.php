<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<?php require __DIR__ . "/inc/header.php"; ?>

<h1>Welcome <?= htmlspecialchars($_SESSION['username'] ?? 'Member') ?></h1>

<?php require __DIR__ . "/inc/footer.php"; ?>
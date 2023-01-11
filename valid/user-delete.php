<?php 

require_once './inc/functions.php';
$id = $_GET['id'] ?? '';

$controllers->members()->delete($id);
redirect('manage-users');






?>


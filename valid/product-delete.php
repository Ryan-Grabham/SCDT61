<?php 

require_once './inc/functions.php';
$id = $_GET['id'] ?? '';

$controllers->products()->delete($id);
redirect('manage-products');






?>
<?php
require_once './inc/functions.php';

$products = $controllers->products()->getAll();
?>

<table class="table table-secondary table-striped">
    <thead>
        <tr>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Admin Controls</th>
        </tr>
    </thead>
    <?php
    foreach ($products as $product):
        ?>
        <tbody>


            <td><?= $product['firstname'] ?></td>
            <td><?= $product['lastname'] ?></td>
            <td><?= $product['email'] ?></td>

            <td>
                <a class="btn btn-success" href="product-edit.php?id=<?=$product['id'] ?>"> Edit</a>
                <a class="btn btn-danger" href="product-delete.php?id=<?=$product['id'] ?>">Delete</a>
            </td>

        </tbody>


        <?php
    endforeach;
    ?>
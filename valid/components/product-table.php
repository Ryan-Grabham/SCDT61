

<?php
require_once './inc/functions.php';

$products = $controllers->products()->getAll();
?>

<table class="table table-secondary table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price (£)</th>
            <th scope="col">Image</th>
            <th scope="col">Admin Controls</th>
            
        </tr>
    </thead>
    
    <?php
    foreach ($products as $product):
        ?>
        <tbody>

            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><image class="col-1 img-thumbnail" src="<?= $product['image']?>"/></td>

            <td>
                <a class="btn btn-success" href="product-edit.php?id=<?=$product['id'] ?>"> Edit</a>
                <a class="btn btn-danger" href="product-delete.php?id=<?=$product['id'] ?>">Delete</a>
            </td>

        </tbody>
        
      

        <?php
    endforeach;
    
    ?>
      <div class="col-4">
        <a class="btn btn-secondary" href="add-product.php"> Add New Product</a>
    </div>


    
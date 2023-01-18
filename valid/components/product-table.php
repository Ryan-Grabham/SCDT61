

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
            <th scope="col">Category</th>
            <th scope="col">Image</th>
            <th scope="col">Admin Controls</th>
            
        </tr>
    </thead>
    
    <?php
    foreach ($products as $product):
        $categoryInfo = $controllers->products()->getCategoryNameById($product['categoryid']);
        ?>
        <tbody>

            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td class="col-4"><?= $product['price'] ?></td>
            <td><?= $categoryInfo['categoryname'] ?></td>

            <td>
                <image class="col-4 img-thumbnail" src="<?= $product['image']?>"/>
            </td>
            

            <td>
                <a class="btn btn-success" id="edit-btn" href="product-edit.php?id=<?=$product['id'] ?>"> Edit</a>
                <a class="btn btn-danger" id="delete-btn" href="product-delete.php?id=<?=$product['id'] ?>">Delete</a>
            </td>

        </tbody>
        

      

        <?php
    endforeach;
    ?>
</table>   
     <div class="col-4 my-4">
        <a class="btn btn-secondary" id="add-btn" href="add-product.php"> Add New Product</a>
    </div>



    

    

    
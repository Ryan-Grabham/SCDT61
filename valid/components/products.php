<?php
require_once './inc/functions.php';

 $products =$controllers->products()->getAll();

foreach ($products as $product):
?>
    <div class="col-4">
        <div class="card">
            <img src="<?= $product['image'] ?>" 
                class="card-img-top" 
                alt="$product['name']">
            <div class="card-body">
                <h5 class="card-title"><?= $product['name'] ?></h5>
                <p class="card-text"><?= $product['description'] ?></p>
                <p class="card-text">£<?= $product['price'] ?></p>
                <a class="btn btn-primary" href="product.php?id= <?= $product['id']?>" >Details</a>
            </div>
        </div>
    </div>
<?php 
endforeach;
?>



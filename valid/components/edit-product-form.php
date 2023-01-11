<?php 

require_once './inc/functions.php';

$message = '';

$id = $_GET['id'] ?? '';

if (!empty($id)){

    $product = $controllers->products()->get($id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $name = InputProcessor::process_string($_POST['name'] ?? '');
        $description = InputProcessor::process_string($_POST['description'] ?? '');
        $price = InputProcessor::process_string($_POST['price'] ?? '');
        $image = InputProcessor::process_file($_FILES['image'] ?? []);

        $valid =  $name['valid'] && $description['valid'] && $price['valid'] && $image['valid'];

        if($valid) {

        if ($image['value'] != '') {
            $image['value'] = ImageProcessor::upload($_FILES['image']);
        }
        else{
                $image['value'] = $product['image'];
        }
        
        
        $args = ['name' => $name['value'] , 
                'description' => $description['value'] , 
                'price' => $price['value'] ,
                'image' =>  $image['value'],
                'id' => $id 
                ];

        $result = $controllers->products()->update($args);

        if($result) {
            redirect('manage-products');
        }
        else {
            $message = "Error adding product."; //Change
        }
        }
        else {
        $message =  "Please fix the following errors: ";
    }

    } 


    ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF'])  . '?id=' . $id ?>" enctype="multipart/form-data">
        <section class="vh-100">
        <div class="container py-5 h-75">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
        
                    <h3 class="mb-2">Edit</h3>
                    <div class="form-outline mb-4">
                    <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Name" required value="<?= htmlspecialchars($product['name'] ?? '') ?>"/>
                    <span class="text-danger"><?= $name['error'] ?? '' ?></span>
                    </div>
                    
                    <div class="form-outline mb-4">
                    <input type="text" id="description" name="description" class="form-control form-control-lg" placeholder="Description" required value="<?= htmlspecialchars($product['description'] ?? '') ?>"/>
                    <span class="text-danger"><?= $description['error'] ?? '' ?></span>
                    </div>
        
        
                    <div class="form-outline mb-4">
                    <input type="number" id="price" name="price" class="form-control form-control-lg" placeholder="Price" required value="<?= htmlspecialchars($product['price'] ?? '') ?>"/>
                    <span class="text-danger"><?= $price['error'] ?? '' ?></span>
                    </div>

                    <div class="mb-4">
                    <image class="img-thumbnail" src="<?= $product['image'] ?>" />
                    </div>
        
                    <div class="form-outline mb-4">
                        <input type="file" accept="image/*" id="image" name="image" class="form-control form-control-lg" placeholder="Select Image" />
                    </div>
        
                    <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Save</button>
                
                    <?= isset($_GET['errmsg']) ? $message = $_GET['errmsg'] : '' ?>
                    <?= $message ? alert($message, 'danger') : '' ?>

                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </form>
<?php
}
else{
    redirect("not-found");
}
?>
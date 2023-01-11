<?php 

require_once './inc/functions.php';

$message = '';

$id = $_GET['id'] ?? '';

if (!empty($id)){

    $products = $controllers->products()->get($id);



    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $name = InputProcessor::process_string($_POST['name'] ?? '');
        $description = InputProcessor::process_string($_POST['description'] ?? '');
        $price = InputProcessor::process_string($_POST['price'] ?? '');


        $valid =  $name['valid'] && $description['valid'] && $price['valid'];

        if($valid) {

        $args = ['name' => $name['value'] , 
                'description' => $desription['value'] , 
                'price' =>  $price['value'],
                'id' => $id ];

        $result = $controllers->products()->update($args);

        if($result) {
            redirect('manage-products');
        }
        else {
            $message = "Email already registered.";
        }
        }
        else {
        $message =  "Please fix the following errors: ";
    }

    } 


    ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id ?>">
        <section class="vh-100">
        <div class="container py-5 h-75">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
        
                    <h3 class="mb-2">Edit </h3>
                    <div class="form-outline mb-4">
                    <input type="text" id="fname" name="fname" class="form-control form-control-lg" placeholder="Firstname" required value="<?= htmlspecialchars($user['firstname'] ?? '') ?>"/>
                    <span class="text-danger"><?= $name['error'] ?? '' ?></span>
                    </div>
                    
                    <div class="form-outline mb-4">
                    <input type="text" id="sname" name="sname" class="form-control form-control-lg" placeholder="Surname" required value="<?= htmlspecialchars($user['lastname'] ?? '') ?>"/>
                    <span class="text-danger"><?= $description['error'] ?? '' ?></span>
                    </div>
        
        
                    <div class="form-outline mb-4">
                    <input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required value="<?= htmlspecialchars($user['email'] ?? '') ?>"/>
                    <span class="text-danger"><?= $empriceail['error'] ?? '' ?></span>
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

}?>
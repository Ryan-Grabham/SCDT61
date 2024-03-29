<?php 

require_once './inc/functions.php';

$message = '';

$id = $_GET['id'] ?? '';

if (!empty($id)){

    $user = $controllers->members()->get($id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $fname = InputProcessor::process_string($_POST['fname'] ?? '');
        $sname = InputProcessor::process_string($_POST['sname'] ?? '');
        $email = InputProcessor::process_email($_POST['email'] ?? '');
        $role = InputProcessor::process_string($_POST['roleid'] ?? '');


        $valid =  $fname['valid'] && $sname['valid'] && $email['valid'] && $role['valid'];

        if($valid) {

        $args = ['firstname' => $fname['value'] , 
                'lastname' => $sname['value'] , 
                'email' =>  $email['value'],
                'roleid' => $role['value'],
                'id' => $id ];

        $result = $controllers->members()->update($args);

        if($result) {
            redirect('manage-users');
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
                    <span class="text-danger"><?= $fname['error'] ?? '' ?></span>
                    </div>
                    
                    <div class="form-outline mb-4">
                    <input type="text" id="sname" name="sname" class="form-control form-control-lg" placeholder="Surname" required value="<?= htmlspecialchars($user['lastname'] ?? '') ?>"/>
                    <span class="text-danger"><?= $sname['error'] ?? '' ?></span>
                    </div>
        
        
                    <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required value="<?= htmlspecialchars($user['email'] ?? '') ?>"/>
                    <span class="text-danger"><?= $email['error'] ?? '' ?></span>
                    </div>

                   
                    <select name="roleid" class="form-select form-select-lg mb-4" aria-label="Default select example">
                        <?php if ($_SESSION["logged_in"]["roleid"] == 1) : ?>
                            <option selected value="1" id="admin" >Administrator</option>
                            <option value="2" id="customer" >Customer</option>                            
                        <?php else: ?>  
                            <option value="1" id="admin" >Administrator</option>  
                            <option selected value="2" id="customer" >Customer</option>
                            
                        <?php endif ?>    
                    </select>
                    
                    <button class="btn btn-primary btn-lg w-100 mb-4" id="submitEdit"type="submit">Save</button>

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
<?php
require_once './inc/functions.php';

$members = $controllers->members()->getAll();
?>
<div class=""></div>
<table class="table table-secondary table-striped">
    <thead>
        <tr>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <?php
    foreach ($members as $member):
        ?>
        <tbody>
            <div class="col-4">

                <td><?= $member['firstname'] ?></td>
                <td>
                    <?= $member['lastname'] ?>
                </td>
                <td><?= $member['email'] ?></td>
            </div>
        </tbody>
        </div>
    <?php
    endforeach;
    ?>
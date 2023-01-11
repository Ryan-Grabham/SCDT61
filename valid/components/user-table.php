<?php
require_once './inc/functions.php';

$members = $controllers->members()->getAll();
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
    foreach ($members as $member):
        ?>
        <tbody>


            <td><?= $member['firstname'] ?></td>
            <td><?= $member['lastname'] ?></td>
            <td><?= $member['email'] ?></td>

            <td>
                <a class="btn btn-success" > Edit</a>
                <a class="btn btn-danger" href="user-delete.php?id=<?=$member['id'] ?>">Delete</a>
            </td>

        </tbody>


        <?php
    endforeach;
    ?>
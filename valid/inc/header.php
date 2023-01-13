<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>
    <?= $title ?? 'Welcome' ?>
  </title>
</head>

<body class="bg-primary">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">Online Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

      </ul>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          <?php

          if (isset($_SESSION["logged_in"])) { // Check roleid == 1, if not dont show these two items 
            if ($_SESSION["logged_in"]["roleid"] == 1) { ?>
              <li class="nav-item">
                    <a class="nav-link" href="./manage-users.php">Manage Users</i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./manage-products.php">Manage Products</i></a>
                  </li> 
            <?php
            }
          } 
          ?>


          <li class="nav-item">
            <?php
            if (!isset($_SESSION["logged_in"])) {
              echo '<a class="nav-link" href="./login.php"><i class="bi bi-person-circle" style="font-size: 2rem"></i></a>';
            } else {
              echo '<a class="btn btn-danger" href="./logout.php" type="submit">Logout</a>';
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
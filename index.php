<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - PHS-L&E
 * Last Updated - 10/05/2021
 */
?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/app/core/header.php') ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/app/core/nav-top.php') ?>
<?php

$user = new User;

//load config file
$config = new Config();
$config->load("./config.php");


$user_data = $user->checkSession();
?>

    <div class="container">

        <h1 class="heading1"><i class="fas fa-users" style="font-size: 1em"></i> Dashboard</h1>
        <div class="Spacer" style="border-bottom: 1px solid #dee0e4;"></div>
        <br>


    </div>

<?php require(__DIR__ . '/app/core/footer.php') ?>
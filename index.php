<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require_once('config/environment.php');

$page = $_GET['page'];
$action = isset($_GET['action']) ? $_GET['action'] : 'main';
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- Title -->
        <link rel="shortcut icon" href="assets/images/home/favicon.png" type="image/x-icon">
        <title>E-commerce</title>

        <!-- Meta TAGs -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="<?= DIR_CSS ?>/reset.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/color.css">

        <link rel="stylesheet" href="<?= DIR_CSS ?>/home/main-header.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/home/main.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/home/main-footer.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/home/response.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/details/style.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/customer/style.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/about/style.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/cart/style.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;500;600&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div id="container">
            <?php require_once (__DIR__. '/views/header.php') ?>

            <?php  

            if (file_exists(__DIR__ . "/pages/$page/$action.php")) {
                require_once(__DIR__ . "/pages/$page/$action.php");
            } else {
                header("Location: index.php?page=home");
            }

            if (!isset($page)) {
                header("Location: index.php?page=home");
            }
            
            ?>

            <?php require_once (__DIR__. '/views/footer.php') ?>
        </div>
    </body>
</html>
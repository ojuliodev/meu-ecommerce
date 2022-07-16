<?php

require_once('config/environment.php');

$page = $_GET['page'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- Title -->
        <title>Ecommerce</title>

        <!-- Meta TAGs -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="<?= DIR_CSS ?>/reset.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/color.css">

        <link rel="stylesheet" href="<?= DIR_CSS ?>/components/main-header.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/components/main.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/components/main-footer.css">
        <link rel="stylesheet" href="<?= DIR_CSS ?>/components/response.css">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;500&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div id="container">
            <?php require_once (__DIR__. '/views/header.php') ?>

            <?php  

            if (file_exists( __DIR__ . '/pages/' . $page . '/main.php')) {
                require_once( __DIR__ . '/pages/' . $page . '/main.php');
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
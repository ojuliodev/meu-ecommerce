<?php

require_once( __DIR__ . '/../models/ProductCategory.php');

$productCategory = new ProductCategory;

?>


<header class="main-header">
    <a href="?page=home"><img class="apple-icon" src="assets/images/home/header/icon.png" alt=""></a>

    <ul class="main-items">
        <li> <a class="items" href="?page=home">Início</a> </li>
        <?php foreach($productCategory->read() as $category) { ?>
            <li> <a class="items" href="<?= DIR_PATH . '?page=category&slug=' . $category['slug']?>"><?= $category['name'] ?></a> </li>
        <?php } ?>
        <li> <a class="items" href="?page=about">Sobre</a> </li>
    </ul>

    <form class="form-search" method="GET">
        <img src="assets/images/home/header/search.png" class="search-icon" alt="">
        <input type="hidden" name="page" class="input-search" value="search">
        <input type="search" name="search" class="input-search">
    </form>

    <div class="hamburguer">
        <img class="menu" src="assets/images/home/header/menu.png" alt="">
    </div>

    <div class="icons">
        <a href="?page=customer<?= !empty($_SESSION['customer']) ? '&action=read' : ''?>"> <img class="customer-icon" src="assets/images/home/header/customer.png" alt=""> </a>
        <a href="?page=cart"> <img class="cart-icon" src="assets/images/home/header/cart.png" alt=""> </a>
    </div>
</header>
<?php

require_once( __DIR__ . '/../models/ProductCategory.php');

$productCategory = new ProductCategory;

?>


<header class="main-header">
    <img class="apple-icon" src="assets/images/home/icon.png" alt="">

    <ul class="main-items">
        <li> <a class="items" href="?page=home">Início</a> </li>
        <?php foreach($productCategory->read() as $category) { ?>
            <li> <a class="items" href="<?= DIR_PATH . '?page=category&slug=' . $category['slug']?>"><?= $category['name'] ?></a> </li>
        <?php } ?>
        <li> <a class="items" href="?page=about">Sobre</a> </li>
    </ul>

    <form class="form-search" method="GET">
        <img src="assets/images/home/search.png" class="search-icon" alt="">
        <input type="hidden" name="page" class="input-search" value="search">
        <input type="text" name="search" class="input-search">
    </form>

    <div class="hamburguer">
        <img class="menu" src="assets/images/home/menu.png" alt="">
    </div>

    <div class="icons">
        <a href="?page=customer<?= !empty($_SESSION['customer']) ? '&action=read' : ''?>"> <img class="customer-icon" src="assets/images/home/customer.png" alt=""> </a>
        <a href="?page=cart"> <img class="cart-icon" src="assets/images/home/cart.png" alt=""> </a>
    </div>
</header>
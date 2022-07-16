<?php

require_once( __DIR__ . '/../models/ProductCategory.php');

$productCategory = new ProductCategory;

?>


<header class="main-header">
    <img class="apple-icon" src="assets/images/icon.png" alt="">

    <ul class="main-items">
        <li> <a class="items" href="?page=home">Início</a> </li>
        <?php foreach($productCategory->read() as $category) { ?>
            <li> <a class="items" href="<?= DIR_PATH . '?page=category&slug=' . $category['slug']?>"><?= $category['name'] ?></a> </li>
        <?php } ?>
        <li> <a class="items" href="">Sobre</a> </li>
    </ul>

    <form action="" class="main-form">
        <img src="assets/images/search.png" class="search-icon" alt="">
        <input type="text" class="input-search">
    </form>

    <div class="hamburguer">
        <img class="menu" src="assets/images/menu.png" alt="">
    </div>

    <div class="icons">
        <img class="customer-icon" src="assets/images/customer.png" alt="">
        <img class="cart-icon" src="assets/images/cart.png" alt="">
    </div>
</header>
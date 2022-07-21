<?php

require_once( __DIR__ . '/../models/ProductCategory.php');

$productCategory = new ProductCategory;

?>


<header class="main-header">
    <img class="apple-icon" src="assets/images/frontend/icon.png" alt="">

    <ul class="main-items">
        <li> <a class="items" href="?page=home">Início</a> </li>
        <?php foreach($productCategory->read() as $category) { ?>
            <li> <a class="items" href="<?= DIR_PATH . '?page=category&slug=' . $category['slug']?>"><?= $category['name'] ?></a> </li>
        <?php } ?>
        <li> <a class="items" href="?page=about">Sobre</a> </li>
    </ul>

    <form action="" class="form-search">
        <img src="assets/images/frontend/search.png" class="search-icon" alt="">
        <input type="text" class="input-search">
    </form>

    <div class="hamburguer">
        <img class="menu" src="assets/images/frontend/menu.png" alt="">
    </div>

    <div class="icons">
        <a href="?page=customer<?= !empty($_SESSION['customer']) ? '&action=read' : ''?>"> <img class="customer-icon" src="assets/images/frontend/customer.png" alt=""> </a>
        <a href="?page=cart"> <img class="cart-icon" src="assets/images/frontend/cart.png" alt=""> </a>
    </div>
</header>
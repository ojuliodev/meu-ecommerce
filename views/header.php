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

    <div class="main-menu-burguer">
        <div class="checkbox-wrapper">
            <label class="hamburguer" for="menu-burguer"> <i class="fa-solid fa-bars fa-2xl"></i> </label>
            <input type="checkbox" id="menu-burguer">

            <div class="menu-items">
                <div class="close-wrapper">
                    <h2>Categoria</h2>
                    <label class="close-menu" for="menu-burguer"><i class="fa-solid fa-xmark fa-2xl"></i></label>
                </div>
                <a class="items items-menu" href="?page=home">Início</a>

                <?php foreach($productCategory->read() as $category) { ?>
                <a class="items items-menu" href="<?= DIR_PATH . '?page=category&slug=' . $category['slug']?>"><?= $category['name'] ?></a>
                <?php } ?>
                <a class="items items-menu" href="?page=about">Sobre</a>
                
                <h2 class="menu-title">Conta</h2>
                <a  class="items items-menu" href="?page=cart"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
                <a  class="items items-menu" href="?page=customer<?= !empty($_SESSION['customer']) ? '&action=read' : ''?>"><i class="fa-solid fa-user"></i> Conta</a>
                <?php if (isset($_SESSION['customer'])): ?>
                    <a class="items items-menu" href="?page=customer&action=logout"><i class="fa-solid fa-user"></i> Sair da Conta</a>
                <?php endif ?>
                
            </div>
        </div>
    </div>

    <div class="icons">
        <a href="?page=customer<?= !empty($_SESSION['customer']) ? '&action=read' : ''?>"> <img class="customer-icon" src="assets/images/home/header/customer.png" alt=""> </a>
        <a href="?page=cart"> <img class="cart-icon" src="assets/images/home/header/cart.png" alt=""> </a>
    </div>
</header>
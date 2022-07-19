<?php

require_once(__DIR__ . '../../../models/Product.php');

$product = new Product;

if (isset($_GET['slug'])) {
    $readBySlug = $product->readBySlug($_GET['slug']);
}

?>

<div class="container-detail">
    <div class="main-image">
        <img class="image-item" src="<?= DIR_IMG . '/' . $readBySlug['banner']?>" alt="">
    </div>
    <div class="product-info">
        <div class="product-wrapper">
            <div class="infos-wrapper">
                <h1 class="title-product"><?= $readBySlug['name'] ?></h1>

                <?php $readBySlug['status'] == 1 ? $statusColor = 'status-sucess' : $statusColor = 'status-danger' ?>
                <p class="product-status <?= $statusColor ?>"><?php echo $readBySlug['status'] == 1 ?'Produto Disponível' : 'Produto indisponível' ?> </p>

                <p class="description-price">à vista</p>

                <div class="main-price">
                    <h3 class="special-price">R$ <?= $readBySlug['special_price'] ?></h3>

                    <h4 class="price">R$ <?= $readBySlug['price'] ?></h4>
                </div>

                <button class="button-cart"> <img class="cart-button" src="assets/images/detail/cart.png" alt=""> ADICIONAR AO CARRINHO</button>

                <h2 class="product-description"><?= $readBySlug['description'] ?></h2>
            </div>
            <div class="cards-wrapper">
                <img class="card-image" src="assets/images/detail/cartao-visa.png" alt="">
                <img class="card-image" src="assets/images/detail/cartao-mastercard.png" alt="">
                <img class="card-image" src="assets/images/detail/cartao america express.png" alt="">
                <img class="card-image" src="assets/images/detail/payment.png" alt="">
                <img class="card-image" src="assets/images/detail/cartao de credito1.png" alt="">
            </div>
        </div>
    </div>
</div>
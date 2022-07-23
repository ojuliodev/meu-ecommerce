<?php

if (isset($_SESSION['cart']) && isset($_SESSION['customer'])) {
    $cart = $_SESSION['cart'];

    if (isset($_GET['create'])) {
        if (empty($_SESSION['orders'])) {
            $_SESSION['orders'] = [];
        }
    
        array_push($_SESSION['orders'], $cart);

        if (!isset($_SESSION['amount'])) {
            $_SESSION['amount'] = [];
        }

        $_SESSION['amount'] = $cart;

        unset($_SESSION['cart']);

        header("Location: ?page=customer&action=read");
    }
}

?>

<main class="cart-container">
    <?php if (isset($cart) && !empty($cart)): ?>

    <table class="cart-main-table">
        <thead>
            <tr>
                <th class="cart-title-table">Produto</th>
                <th class="cart-title-table">Quantidade</th>
                <th class="cart-title-table">Valor</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($cart as $product): ?>
                <tr class="cart-wrapper">
                    <td class="cart-name">
                        <div>
                            <img class="cart-image" src="assets/images/<?= $product['banner']?>" alt="">
                        </div>
                        <?= $product['name'] ?>
                    </td>
                    <td class="cart-description">
                        <div class="cart-description-wrapper">
                            <?= $product['quantity'] ?>
                        </div>
                    </td>
                    <td>R$ <?= $product['special_price'] * $product['quantity'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="cart-button-wrapper">
        <a class="cart-button-buy" href="?page=cart&create=order">COMPRAR</a>
    </div>
    <?php else: ?>
        <div class="cart-logout">
            <h2 class="cart-subtitle">Seu carrinho está vazio :(</h2>
            <?php if (!isset($_SESSION['customer'])): ?>
                <a href="?page=customer" class="cart-create-account">Fazer Login</a>
            <?php endif?>
        </div>
    <?php endif ?>
</main>
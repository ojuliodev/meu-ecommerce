<?php

require_once(__DIR__ . '/../../models/Customer.php');
require_once(__DIR__ . '/../../models/Product.php');

$customer = new Customer;

if (isset($_SESSION['customer'])) {
    $user = $_SESSION['customer'];

    if (isset($_SESSION['orders'])) {
        $orders = $_SESSION['orders'];
    }


    if (isset($_SESSION['amount'])) {
        $amount = $_SESSION['amount'];

        $product = new Product;

        foreach ($amount as $index) {
            $replaceAmount = $index['amount'] - $index['quantity'];

            $updateByAmount = $product->updateByAmount($replaceAmount, $index['product_id']);
        }
    }

    unset($_SESSION['amount']);

    if (isset($_SESSION['msg'])): ?>

        <div class="flash-message">
            <span class="ms ok"><?= $_SESSION['msg'] ?></span>
        </div>

    <?php unset($_SESSION['msg']); endif;
}

?>

<main class="customer-read-container">
    <table class="customer-main-table">
        <thead>
            <tr>
                <th class="customer-table-title">Nome</th>
                <th class="customer-table-title">Email</th>
                <th class="customer-table-title">Idade</th>
                <th class="customer-table-title -center">Conta</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>
                    <div class="customer-name">
                        <img class="customer-photo" src="assets/images/<?= $user['image'] ?>" alt="">
                        <p><?= $user['name'] ?></p>
                    </div>
                </td>
                <td class="customer-email">
                    <p><?= $user['email'] ?></p>
                </td>
                <td class="customer-age"><p><?= $user['age'] ?></p></td>
                <td>
                    <a class="customer-logout" href="?page=customer&action=logout">Sair</a>
                </td>
            </tr>
        </tbody>
    </table>

    <?php if (isset($orders)): ?>
        <h2 class="customer-order-title">Todos os Pedidos</h2>
        <ul class="customer-list-products">
            <?php $index = 1; foreach($orders as $order => $products):?>
                <li class="customer-orders">
                    <p><?= "Pedido $index" ?></p>
                    <?php foreach($products as $product): ?>

                        <div class="customer-order">
                            <img class="customer-photo-product" src="assets/images/<?= $product['banner'] ?>" alt="">
                            <div class="customer-list-name">
                                <p><?= $product['quantity'] ?> - <?= $product['name'] ?></p>
                            </div>
                            <a class="customer-button" href="?page=product&slug=<?= $product['slug'] ?>">Ver Produto</a>
                        </div>

                    <?php $index++; endforeach ?>
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
</main>
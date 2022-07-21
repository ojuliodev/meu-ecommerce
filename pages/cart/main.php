<?php

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}   

?>

<?php if (isset($cart) && !empty($cart)): ?>

<table>
    <thead>
        <tr>
            <th></th>
            <th>Produto</th>
            <th>Valor</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($cart as $product): ?>
            <tr>
                <td><?= $product['banner'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php else: ?>
    <h2>Seu carrinho está vazio</h2>
    <a href="?page=customer">Faça seu Login</a>
<?php endif ?>
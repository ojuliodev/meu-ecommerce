<?php

require_once(__DIR__ . '/../../models/Customer.php');

$customer = new Customer;

if (isset($_POST['submit'])) {
    if ($_POST['password'] == $_POST['confirm-password']) {
        $create = $customer->create($_POST);

        if($create) {
            $_SESSION['msg'] = "Cadastrado com sucesso!";
            header("Location: index.php?page=customer");
        } else {
            echo "Erro ao criar a conta";
        }
    } else {
        $_SESSION['msg'] = "Digite a senha corretamente!";?>

        <div class="flash-message">
            <span class="ms erro"><?= $_SESSION['msg'] ?></span>
        </div>
    <?php  unset($_SESSION['msg']); }
}

?>


<main class="customer-container">
    <h1 class="customer-main-title">Criar conta</h1>

    <div class="customer-form-wrapper">
        <form action="" class="customer-main-form" method="POST" enctype="multipart/form-data">
            <div class="customer-input-wrapper">
                <input type="text" name="name" placeholder="Nome" required>

                <input type="email" name="email" placeholder="E-mail" required>

                <input type="password" name="password" placeholder="Senha" required>

                <input type="password" minlength="8" name="confirm-password" placeholder="Confime a senha" required>

                <button type="submit" minlength="8" name="submit" class="customer-main-button">Criar conta</button>
            </div>
        </form>
    </div>
</main> 
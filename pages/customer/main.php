<?php

require_once(__DIR__ . '/../../models/Customer.php');

if (isset($_SESSION['customer'])) {
    header("Location: ?page=home");
}

$customer = new Customer;

if (isset($_SESSION['msg'])) { ?>

<div class="flash-message">
    <span class="ms ok"><?= $_SESSION['msg'] ?></span>
</div>

<?php } unset($_SESSION['msg']);

if (isset($_POST['submit'])) {
    $customer = $customer->login($_POST);

    if ($customer) {
        header("Location: ?page=customer&action=read&user=" . $customer['customer_id'] . "");

        $_SESSION['customer'] = $customer;

        $_SESSION['msg'] = "Login efetuado com sucesso!";
    } else {
        if (isset($_POST['submit'])) {
        $_SESSION['msg'] = "Email ou Senha inválidos!";?>

        <div class="flash-message">
            <span class="ms erro"><?= $_SESSION['msg'] ?></span>
        </div>
        <?php  unset($_SESSION['msg']);
    } }
}

?>

<main class="customer-container">
    <h1 class="customer-main-title">Fazer Login</h1>

    <div class="customer-form-wrapper">
        <form action="?page=customer" class="customer-main-form" method="POST">
            <div class="customer-input-wrapper">
                <input type="email" name="email" placeholder="E-mail">

                <input type="password" name="password" placeholder="Senha">
            </div>

            <a href="" class="customer-recover-password">Esqueceu a senha?</a>

            <button type="submit" name="submit" class="customer-main-button">Fazer Login</button>
        </form>
    </div>

    <a href="?page=customer&action=create" class="customer-create-account">Criar conta</a>
</main>
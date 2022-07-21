<?php

require_once(__DIR__ . '/../../models/Customer.php');

$customer = new Customer;

if (isset($_SESSION['customer'])) {
    $user = $_SESSION['customer'];
}

?>

<table>
    <thead>
        <tr>
            <tr>Nome</tr>
            <tr>Email</tr>
        </tr>
    </thead> 
    <tbody>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
        </tr>
    </tbody>   
</table>
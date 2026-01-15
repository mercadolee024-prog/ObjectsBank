<?php
// Mercado, Justin Lee B.
// WD - 203
include 'classes/Account.php';
include 'classes/Customer.php';
include 'includes/header.php';
$accounts = [
    new Account(20489446, 'Checking', -20),
    new Account(20148896, 'Savings', 380),
    new Account(30990011, 'Fixed Deposit', 1250000.00),
    new Account(44556677, 'Joint Account', 5000000.00) 
];

$customer = new Customer(
    'Kate', 
    'Mercado', 
    'katemercado21@email.com',   
    'mypassword123',       
    $accounts
);
?>

<h2>NAME: <?= strtoupper($customer->getFullName()); ?></h2>

<table>
    <tr>
        <td colspan="3"><strong>Email:</strong> <?= $customer->email; ?></td>
    </tr>
    <tr>
        <th>ACCOUNT NUMBER</th>
        <th>ACCOUNT TYPE</th>
        <th>BALANCE</th>
    </tr>

  

    <?php foreach ($customer->accounts as $account): ?>
    <tr>
        <td><?= $account->number; ?></td>
        <td><?= $account->type; ?></td>
        <?php if ($account->balance >= 0): ?>
            <td class="credit">₱ <?= number_format($account->balance, 2); ?></td>
        <?php else: ?>
            <td class="overdrawn">₱ <?= number_format($account->balance, 2); ?></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
</table>


<?php include 'includes/footer.php'; ?>

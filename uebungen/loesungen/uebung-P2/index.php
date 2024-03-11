<?php

include 'header.php';
require_once 'account.php';
$giro    = new Bank_Account( '123456', 'Giro', 1000.00 );
$savings = new Bank_Account( '654321', 'Savings', 5000.00 );
?>
<main style="padding: 0">
    <table>
        <tr>
            <th>Date</th>
            <th><?= $giro->type ?></th>
            <th><?= $savings->type ?></th>
        </tr>
        <tr>
            <td>19 Sept.</td>
            <td><?= $giro->balance; ?></td>
            <td><?= $savings->balance; ?></td>
        </tr>
        <tr>
            <td>11 Nov.</td>
            <td><?= $giro->deposit( 800 ) ?></td>
            <td><?= $savings->withdraw( 1233 ); ?></td>
        </tr>
        <tr>
            <td>15 Nov.</td>
            <td><?= $giro->withdraw( 1455 ) ?></td>
            <td><?= $savings->deposit( 657 ); ?></td>
        </tr>
    </table>
</main>
<?php include 'footer.php'; ?>


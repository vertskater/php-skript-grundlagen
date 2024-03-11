<?php

spl_autoload_register( function ( $class ) {
	require_once $class . '.php';
} );
// assoziatives Array, das übergeben wird
$data = [
	'balance' => 3000.00,
	'iban'    => 'AT1234567890',
	'owner'   => 'Lukas Ludwig',
	'stocks'  => [
		[ 'label' => 'MSFT', 'price' => 240.0, 'amount' => 10 ],
		[ 'label' => 'AAPL', 'price' => 304.0, 'amount' => 5 ],
		[ 'label' => 'PYPL', 'price' => 102.0, 'amount' => 2 ],
		[ 'label' => 'NVDA', 'price' => 756.0, 'amount' => 1 ],
	]
];
// Erstelle eine Depot-Instanz aus dem Array mit der static Methode fromArray
$my_depot = Depot::fromArray( $data );
var_dump( $my_depot );

// Erstelle 4 Aktien Instanzen
$microsoft = new Stock( 1, 'MSFT', 240.0, );
$apple     = new Stock( 2, 'AAPL', 304.0, );
// ...
$paypal = new Stock( 3, 'PYPL', 102.0, );
$nvidia = new Stock( 4, 'NVDA', 756.0, );
// Erstelle eine Depot-Instanz
$depot = new Depot( [], 1000.0, 'AT1234567890', 'Lucia Ludwig' );
// Zahle 4000.00 auf das Depot ein
$depot->deposit( 4000.00 );
// Kaufe 10 MSFT, 5 AAPL, 2 PYPL und 1 NVDA
$depot->buyStock( $microsoft, 10 );
$depot->buyStock( $apple, 5 );
$depot->buyStock( $paypal, 2 );
$depot->buyStock( $nvidia, 1 );

include 'header.php';
?>
<main style="padding: 0;">
    <table>
        <tr>
            <th>Label</th>
            <th>Price/Piece</th>
            <th>Amount</th>
            <th>Value</th>
        </tr>
			<?php foreach ( $depot->getStocks() as $stock ) : ?>
          <tr>
              <td><?= $stock->label ?></td>
              <td><?= $stock->price ?></td>
              <td><?= $stock->amount ?></td>
              <td><?= $stock->price * $stock->amount ?></td>
          </tr>
			<?php endforeach; ?>
        <tr>
            <td>Balance</td>
            <td></td>
            <td></td>
            <td><?= $depot->balance ?></td>
        </tr>
    </table>
</main>
<?php include 'footer.php'; ?>


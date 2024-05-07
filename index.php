<?php

function doSomethingWithArray( array $array, callable $cb ) {
	foreach ( $array as $key => $value ) {
		$cb( $key, $value );
	}
}

/*function printArray( $key, $value ) {
	echo $key . ' => ' . $value . PHP_EOL;
}*/

doSomethingWithArray( [ 'a' => 1, 'b' => 2, 'c' => 3 ], function ( $key, $value ) {
	echo $key . ' => ' . $value . PHP_EOL;
} );


$nums = [ 98, 23, 54, 12, 20, 7, 27, 19, 33, 45 ];

function summe( $carry, $item ) {
	return $carry += $item;
}

function product( $carry, $item ) {
	return $carry *= $item;
}

$summe   = array_reduce( $nums, 'summe' );
$product = array_reduce( $nums, 'product', 1 );

echo 'Summe: ' . $summe . PHP_EOL;
echo 'Produkt: ' . $product . PHP_EOL;


function custom_array_reduce( array $array, callable $cb, $initial = 0 ) {
	$accumulator = $initial;
	foreach ( $array as $item ) {
		$accumulator = $cb( $accumulator, $item ); // $accumulator = $accumulator + $item ($carry, $item)
	}

	return $carry;
}


<?php

$isbn         = '9-783836-283274';
$isbn         = str_replace( '-', '', $isbn );
$pruef_ziffer = substr( $isbn, - 1 );
$summe        = 0;

for ( $i = 0; $i < 12; $i ++ ) {
	$summe += $isbn[ $i ] * ( ( $i % 2 ) * 2 + 1 );
	/*if ( $i % 2 == 0 ) {
		$summe += $isbn[ $i ];
	} else {
		$summe += $isbn[ $i ] * 3;
	}*/
}
$gegen_pruefung = 10 - (int) substr( $summe, - 1 );
echo $pruef_ziffer == $gegen_pruefung ? 'ISBN ist korrekt' : 'ISBN ist falsch';

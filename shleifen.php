<?php

// Code mit Schleife
for ( $i = 0; $i < 5; $i ++ ) {
	echo "<button>Ich bin Btn nr $i</button>";
}
echo '<br>';

// For-Schleife
for ( $i = 100; $i > 0; $i -- ) {
	echo $i . '<br>';
}

// While-Schleife
$summe = 0;
while ( $summe < 100 ) {
	$summe += rand( 1, 10 );
	echo 'Summe Zufallszahlen: ' . $summe . '<br>';
}
$i = 0;
do {
	echo $i . '<br>';
	$i ++;
} while ( $i < 10 );


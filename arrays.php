<?php
$zahlen = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ];
$summe  = 0;

$summe += $zahlen[0];
$summe += $zahlen[1];
// ...

for ( $i = 0; $i < count( $zahlen ); $i ++ ) {
	$summe += $zahlen[ $i ];
}

foreach ( $zahlen as $zahl ) {
	$summe += $zahl;
}


$kurse = [
	'PHP'    => 5,
	'HTML'   => 3,
	'CSS'    => 2,
	'JS'     => 4,
	'Python' => 5
];
while ( next( $kurse ) ) {
	echo key( $kurse ) . " => " . current( $kurse ) . "<br>";
}

foreach ( $kurse as $kurs => $teilnehmer ) {
	echo "Im Kurs {$kurs} sind {$teilnehmer} eingeschrieben. <br>";
}


$personen = [
	'Max'   => 25,
	'Anna'  => 23,
	'Peter' => 30,
	'Lisa'  => 28
];

foreach ( $personen as $name => $alter ) {
	echo "Die Person {$name} ist {$alter} Jahre alt. <br>";
}

$numbers = [ 23, 89, 45, 67, 34, 78, 56, 12, 90, 67 ];

$verschachtelt = [
	[ 1, 2, 3, 4 ],
	[ 5, 6, 7, 8 ],
	[ 9, 10, 11, 12 ]
];


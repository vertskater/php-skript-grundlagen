<?php
$components = [
	[ 'city' => 'london' ],
	[ 'city' => 'paris' ],
	[ 'city' => 'new york' ],
	[ 'city' => 'lisbon' ],
	[ 'city' => 'tokyo' ],
	[ 'city' => 'berlin' ],
	[ 'city' => 'rome' ],
	[ 'city' => 'madrid' ],
	[ 'city' => 'vienna' ],
	[ 'city' => 'amsterdam' ]
];

$names = [
	[ 'first' => 'peter', 'last' => 'parker' ],
	[ 'first' => 'bruce', 'last' => 'wayne' ],
	[ 'first' => 'clark', 'last' => 'kent' ],
	[ 'first' => 'diana', 'last' => 'prince' ],
	[ 'first' => 'barry', 'last' => 'allen' ],
	[ 'first' => 'hal', 'last' => 'jordan' ],
	[ 'first' => 'arthur', 'last' => 'curry' ],
	[ 'first' => 'victor', 'last' => 'stone' ],
	[ 'first' => 'wally', 'last' => 'west' ],
	[ 'first' => 'john', 'last' => 'stewart' ]
];

$numbers = [
	'78',
	'45',
	'23',
	'67',
	'89',
	'12',
	'56',
	'34',
	'90',
	'87',
	'65',
	'43',
	'21',
	'76',
	'98',
	'54',
	'32',
	'10',
	'9',
	'89'
];

$random_nums = "4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 99, 34, 56, 78, 90, 23, 45, 67, 89, 12, u, 56, 34, 90, 87, 65, 43, 21, 76, 98, 54, 32, 10, 9, 89";

// Aufgabe 1:
$sum = count( $numbers ) + count( $names ) + count( $components );
echo $sum . '<br>';
//Aufgabe 2:
echo count( $names, 1 );

//Aufgabe 3:

foreach ( $names as $key => $name ) {
	foreach ( $name as $value ) {
		$names[ $key ]['city'] = $components[ $key ]['city'];
	}
}
echo '<pre>';
print_r( $names );
echo '</pre>';

//Aufgabe 4:
foreach ( $numbers as $key => $number ) {
	$numbers[ $key ] = (int) $number;
}

//Aufgabe 5:
sort( $numbers );
echo '<pre>';
print_r( $numbers );
echo '</pre>';

//Aufgabe 6:
$index = array_search( 43, $numbers );
echo $index;
// find duplicates
$duplicates = array_unique( array_diff_assoc( $numbers, array_unique( $numbers ) ) );
echo '<pre>';
print_r( $duplicates );
echo '</pre>';
//Aufgabe 7:
array_splice( $numbers, 10 );
echo '<pre>';
print_r( $numbers );
echo '</pre>';
//Aufgabe 8:
//Filtern Sie aus dem Array $components alle Städte heraus, die mit dem Buchstaben 'l' beginnen und speichern Sie diese in einem neuen indexbasiertem Array $cities.
//Ergebnis: Array( [0] => 'london', [1] => 'lisbon' )
$cities = [];
foreach ( $components as $value ) {
	if ( str_starts_with( $value['city'], 'l' ) ) {
		$cities[] = $value['city'];
	}
}
echo '<pre>';
print_r( $cities );
echo '</pre>';

//Aufgabe 9:
//Erstellen Sie aus dem Array $components ein neues assoziatives Array das den Stadtnamen als key und die Länge des Stadtnamens als value enthält.
//z. B. ['london' => 6, 'paris' => 5, ...]
$cityLength = [];
foreach ( $components as $value ) {
	$cityLength[ $value['city'] ] = strlen( $value['city'] );
}
echo '<pre>';
print_r( $cityLength );
echo '</pre>';
//Aufgabe 10:
//Erstellen Sie aus dem Array $components ein neues assoziatives Array, dass als Value ein indexbasiertes Array enthält, das die einzelnen Buchstaben des Stadtnamens enthält.
//z. B. ['london' => ['l', 'o', 'n', 'd', 'o', 'n'], 'paris' => ['p', 'a', 'r', 'i', 's'], ...]
$cityLetters = [];
foreach ( $components as $value ) {
	$cityLetters[ $value['city'] ] = str_split( $value['city'] );
}
print '<pre>';
print_r( $cityLetters );
print '</pre>';
//Aufgabe 11:
// Kombinieren Sie das Array $numbers mit dem Array $names zu einem neuen Array $combined.
// Dabei sollten die Werte des Arrays $numbers als key und die Werte des Arrays $names als value verwendet werden.
// z. B. [78 => ['first' => 'peter', 'last' => 'parker'], 45 => ['first' => 'bruce', 'last' => 'wayne'], ...]
$combined = [];
foreach ( $numbers as $key => $number ) {
	$combined[ $number ] = $names[ $key ];
}
echo '<pre>';
print_r( $combined );
echo '</pre>';
//Aufgabe 12:
//Erstellen Sie aus dem String $random_nums ein Array $random_numbers. Es hat sich das Zeichen u unter die Zahlen geschlichen.
//Entfernen Sie dieses Zeichen und filtern Sie alle Zahlen heraus, die größer als 50 sind.
$random_numbers = explode( ', ', $random_nums );
foreach ( $random_numbers as $key => $value ) {
	if ( ! is_numeric( $value ) || $value < 50 ) {
		unset( $random_numbers[ $key ] );
	}
}
echo '<pre>';
print_r( $random_numbers );
echo '</pre>';
//Aufgabe 13:
//Erstellen Sie aus dem Array $names einen String $name_string, der alle Vornamen durch ein Komma getrennt enthält.
//Der Anfangsbuchstabe sollte groß geschrieben sein.
$name_string = '';
foreach ( $names as $name ) {
	$name_string .= ucfirst( $name['first'] . ', ' );
}
echo $name_string;

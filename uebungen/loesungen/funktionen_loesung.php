<?php

// Aufgabe 1: Schreiben Sie eine Funktion die, die Summe aller geraden Zahlen aus dem Array $zahlen zurückgibt.
$zahlen = [ 23, 45, 66, 87, 199, 267, 2, 8, 89, 933 ];
function sum_even( array $zahlen ): int {
	$summe = 0;
	foreach ( $zahlen as $zahl ) {
		if ( $zahl % 2 === 0 ) {
			$summe += $zahl;
		}
	}

	return $summe;
}


// Aufgabe 2: Schreiben Sie eine Funktion die, einen Buch ISBN-13 Code validiert.
function validate_isbn( string $isbn ): bool {
	$isbn = str_replace( '-', '', $isbn );
	if ( ! preg_match( '/^\d{13}$/', $isbn ) ) {
		return false;
	}
	$sum = 0;
	for ( $i = 0; $i < 12; $i ++ ) {
		$sum += $isbn[ $i ] * ( $i % 2 === 0 ? 1 : 3 );
	}
	$checksum = ( 10 - ( $sum % 10 ) ) % 10;

	return $checksum === (int) $isbn[12];
}

validate_isbn( '9-783836-283274' ); // true


// Aufgabe 3: Schreiben Sie die Funktion get_isbn_result, die die Gültigkeit einer ISBN-13 prüft und das Ergebnis als String zurückgibt.
function get_isbn_result( string $isbn ): string {
	return validate_isbn( $isbn ) ? 'ISBN ist korrekt' : 'ISBN ist falsch';
}

echo get_isbn_result( '9-783836-283274' ); // ISBN ist korrekt
echo get_isbn_result( '9-783836-283275' ); // ISBN ist falsch

// Aufgabe 4: Schreiben Sie eine Funktion, die das Array personal_data in ein assoziatives Array umwandelt.
$personal_data = [ 'Max', 'Mustermann', '1970-01-01', 'Musterstraße 1', '12345', 'Musterstadt' ];
function to_assoc( array $data ): array {
	return [
		'vorname'  => $data[0],
		'nachname' => $data[1],
		'geburt'   => $data[2],
		'strasse'  => $data[3],
		'plz'      => $data[4],
		'ort'      => $data[5],
	];
}

var_dump( to_assoc( $personal_data ) ); // ['vorname' => 'Max', 'nachname' => 'Mustermann', ...]

// Aufgabe 5: Schreiben Sie eine Funktion, die ein Geburtsdatum erhält und die Anzahl der Tage bis zum heutigen Tag zurückgibt.
function days_until_today( string $date ): int {
	/*$now  = new DateTime();
	$then = new DateTime( $date );
	return $now->diff( $then )->days;*/
	$now  = new DateTime();
	$now  = strtotime( $now->format( 'Y-m-d' ) );
	$then = strtotime( $date );

	// 60 Sekunden * 60 Minuten * 24 Stunden = 1 Tag
	return ( $now - $then ) / ( 60 * 60 * 24 );
}

echo days_until_today( '1970-11-04' ); // 19475

// Aufgabe 6: Schreiben Sie eine Funktion, die dem Array $students neuen Studenten hinzufügt. Die Übergabe des Arrays soll per Referenz erfolgen.
$students = [ [ 'name' => 'Susanne', 'age' => 23 ], [ 'name' => 'Max', 'age' => 25 ] ];
function add_student( array &$students, array $student ): void {
	$students[] = [ 'name' => $student['name'], 'age' => $student['age'] ];
}

add_student( $students, [ 'name' => 'Anna', 'age' => 22 ] );
var_dump( $students ); // [ [ 'name' => 'Susanne', 'age' => 23 ], [ 'name' => 'Max', 'age' => 25 ], [ 'name' => 'Anna', 'age' => 22 ] ]


//Aufgabe 7: Schreiben Sie eine Funktion, die die Dateigröße eines Bildes berechnet und diese in MB zurückgibt. Die Funtkion erhält eine Auflösung als Parameter.
function image_size( int $width, int $height ): float {
	return round( $width * $height * 3 / ( 1024 * 1024 ), 2 );
}

echo image_size( 1920, 1080 ); // 5.93 bei 24 Bit Farbtiefe

// optionale Aufgabe 8 (schwer): Schreiben Sie eine Funktion, die das Array $students nach dem Namen sortiert. Das Array wird auch hier als Verweis übergeben.
function sort_students( array &$students ): void {
	usort( $students, static function ( $a, $b ) {
		return $a['name'] <=> $b['name'];
	} );
}

var_dump( $students ); // [ [ 'name' => 'Anna', 'age' => 22 ], [ 'name' => 'Max', 'age' => 25 ], [ 'name' => 'Susanne', 'age' => 23 ] ]
sort_students( $students );
var_dump( $students );
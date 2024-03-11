<?php

$x = 30;
$y = 20;

if ( $x > $y ) {
	echo "{$x} ist größer als {$y}";
} else {
	echo "{$x} ist kleiner oder gleich {$y}";
}

echo '<br>';
$alter = 29;

if ( $alter < 12 ) {
	echo 'Sie sind ein Kind';
} elseif ( $alter < 18 ) {
	echo 'Sie sind eine Jugendliche:r';
} elseif ( $alter < 27 ) {
	echo 'Sie sind ein:e junge:r Erwachene:r';
} else {
	echo 'Sie sind ein:e Erwachsene:r';
}

// logisches UND
$erg = 11 > 10 && 29 < 30; // true
// logisches ODER
$erg = 11 > 10 || 29 > 30; // true
// XOR
$erg = 11 > 10 xor 31 > 30; // false
// Negation
$erg = ! true; // false

if ( 11 > 10 && 29 < 30 ) {
	echo 'Beide Bedingungen sind wahr';
}
if ( 11 > 10 || 29 > 30 ) {
	echo 'Mindestens eine Bedingung ist wahr';
}
if ( 11 > 10 xor 31 > 30 ) {
	echo 'Genau eine Bedingung ist wahr';
}
if ( ! true ) {
	echo 'Die Bedingung ist falsch';
}

$alter = 24;

if ( $alter >= 18 && $alter <= 27 ) {
	echo 'Kanditat:in ist für ein Stipendium zugelassen';
} else {
	echo 'Kanditat:in leider nicht zugelassen';
}
echo '<br>';
$ort = 'Graz';
if ( $ort === 'Graz' || $ort === 'Wien' || $ort === 'Linz' ) {
	echo 'Sie wohnen in einer Landeshauptstadt';
} else {
	echo 'Sie wohnen nicht in einer Landeshauptstadt';
}


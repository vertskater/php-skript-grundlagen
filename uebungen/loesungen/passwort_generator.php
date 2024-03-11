<?php
$password = '';
$random   = rand( 33, 126 );
for ( $i = 0; $i < 8; $i ++ ) {
	$password .= chr( $random );
	$random   = rand( 33, 126 );
}
echo $password;
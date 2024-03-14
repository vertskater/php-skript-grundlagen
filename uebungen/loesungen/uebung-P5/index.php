<?php
include './views/header.php';
include_once './includes/functions.php';

if ( isset( $_GET['char'] ) ) {
	$first_letter = $_GET['char'] ?? '';
	echo "<h3>Namen die mit " . e( $first_letter ) . " beginnen</h3>";
	include './views/filtered_names.view.php';
} else {
	include './includes/instruction.php';
}
include './views/footer.php';






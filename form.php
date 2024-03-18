<?php
declare( strict_types=1 );
include 'functions.php';

$agree = '';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$agree = isset( $_POST['terms'] ) ?? '';
	if ( $agree ) {
		echo '<pre>Thank you</pre>';
	} else {
		echo '<pre>You must agree to our terms and conditions</pre>';
	}
}
?>
<?php include 'header.php'; ?>
<main>
    <h3>You must agree our terms and conditions</h3>
    <form action="form.php" method="POST">
        <label>I Agree to the terms and conditions
            <input type="checkbox" name="terms" <?= $agree ? 'checked' : '' ?>>
        </label>
        <input type="submit" name="registrieren" value="Submit">
    </form>
</main>


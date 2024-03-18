<?php
declare( strict_types=1 );
require 'validate.php';

$user   = [
	'name'  => '',
	'age'   => '',
	'terms' => false,
];
$errors = [
	'name'  => '',
	'age'   => '',
	'terms' => '',
];

$info     = '';
$settings = [ 'flags' => FILTER_FLAG_ALLOW_HEX, 'options' => [ 'min_range' => 18, 'max_range' => 90 ] ];

$settings['flags'] = // string;
$settings['options'] = // array of options;

$filter = filter_input( INPUT_POST, 'age', FILTER_VALIDATE_INT, $settings );

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$user['name']  = $_POST['name'];
	$user['age']   = $_POST['age'];
	$user['terms'] = ( isset( $_POST['terms'] ) && $_POST['terms'] == true );

	$errors['name']  = is_text( $user['name'], 3, 20 ) ? '' : 'Name must be between 3 and 50 characters';
	$errors['age']   = is_number( (int) $user['age'], 18, 90 ) ? '' : 'Age must be between 0 and 100';
	$errors['terms'] = $user['terms'] ? '' : 'You must agree to the terms and conditions';

	if ( empty( array_filter( $errors ) ) ) {
		$info = 'Form was submitted successfully';
	} else {
		$info = 'Form has errors, please correct the following fields';
	}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/pico.classless.min.css">
    <title>Document</title>
</head>
<body>
<main>
	<?php echo "<pre>$info</pre>" ?>
    <form action="simple-form.php" method="POST">
        <label for="name">Name
            <input type="text" id="name" name="name" placeholder="Your name" value="<?= e( $user['name'] ) ?>">
            <span style="color: red"><?= $errors['name'] ?></span>
        </label>
        <label for="age">Age
            <input type="text" id="age" name="age" placeholder="Your age" value="<?= e( $user['age'] ) ?>">
            <span style="color: red"><?= $errors['age'] ?></span>
        </label>
        <label for="terms">I agree to the terms and conditions
            <input type="checkbox" id="terms" name="terms" <?= $user['terms'] ? 'checked' : '' ?>>
            <span style="color: red"><?= $errors['terms'] ?></span>
        </label>
        <button type="submit">Absenden</button>
    </form>
</main>
<pre><?php print_r( $filter ); ?></pre>
</body>
</html>


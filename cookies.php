<?php
// Cookie wird ausgelesen und der Wert wird in $color gespeichert
$color = $_COOKIE['color'] ?? 0;
// Farboptionen werden definiert 0 = Light-Mode, 1 = Dark-Mode
$options = [ 0, 1 ];
// Wenn das Formular abgeschickt wurde, wird der Wert von color in den Cookie gespeichert
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$color = $_POST['color'] ?? 0;
	// Cookie wird gesetzt und ist 1 Stunde gültig
	setcookie( 'color', $color, time() + 60 * 60, '/', '', false, true );
}
// Wenn der Wert von color nicht in den Optionen enthalten ist, wird der Wert auf 0 gesetzt
$color = in_array( $color, $options ) ? $color : 0;
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>PHP Cookie Example</title>
    <link rel="stylesheet" href="pico.classless.min.css">
    <style>
        .bg-light {
            background-color: #f8f9fa;
            color: #495057;

            h1 {
                color: #343a40;
            }
        }

        .bg-dark {
            background-color: #343a40;
            color: #afbbc4;

            h1 {
                color: #f8f9fa;
            }
        }
    </style>
</head>
<body class="<?= $color ? 'bg-light' : 'bg-dark' ?>">
<main>
    <h1>Switch <?= $color ? 'Dark' : 'Light' ?>-Mode</h1>
    <form action="cookies.php" method="post">
        <input type="hidden" name="color" value="<?= $color ? 0 : 1 ?>">
        <button type="submit" class="button"><?= $color ? 'Dark-' : 'Light-' ?> Mode</button>
    </form>
</main>
</body>
</html>



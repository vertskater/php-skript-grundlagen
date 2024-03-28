<?php
// Start einer neuen Session oder auslesen der Session Datei
session_start();
// Auslesen des Counter-Wertes aus der Session Datei oder setzen auf 0
$counter = $_SESSION['counter'] ?? 0;
$counter ++;
// Speichern des Counter-Wertes in der Session Datei
$_SESSION['counter'] = $counter;
?>

    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Session Counter</title>
    </head>
    <body>
    <h1>Session Counter</h1>
    <p>Seite wurde <?php echo $counter; ?> mal aufgerufen.</p>
    </body>
    </html>

<?php
$_SESSION = [];
$params   = session_get_cookie_params();
// session_name() = PHPSESSID
setcookie( session_name(), '', time() - 42000,
	$params["path"], $params["domain"],
	$params["secure"], $params["httponly"]
);
session_destroy();
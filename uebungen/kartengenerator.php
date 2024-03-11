<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Do-While-Schleife</title>
    <style>
        .container {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;

            div {
                padding: 30px;
                margin: 20px;
                border: 1px solid black;
            }
        }
    </style>
</head>
<body>
<h1>Do-While-Schleife</h1>
<form action="kartengenerator.php" method="post">
    <p>Kartengenerator: Geben Sie die gewünschte Anzahl an Karten ein.</p>
    <label for="zahl">Zahl:
        <input type="number" name="zahl" size="3">
    </label>
    <input type="submit" value="Absenden">
    <div class="container">
			<?php
			if ( isset( $_POST['zahl'] ) ) {
				$menge = $_POST['zahl'];
			}
			if ( isset( $menge ) && $menge > 0 ) {
				/* ---------------------------------------
					Hier beginnt die Übung
				--------------------------------------- */
				
				/* ---------------------------------------
					Hier endet die Übung
			    --------------------------------------- */
			}
			?>
    </div>
</form>
</body>
</html>
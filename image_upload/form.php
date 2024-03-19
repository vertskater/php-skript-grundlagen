<?php
declare( strict_types=1 );
include 'functions.php';

$error              = '';
$max_file_size      = 1024 * 1024 * 2; // 2MB
$upload_dir         = __DIR__ . '/uploads/';
$allowed_types      = [ 'image/jpeg', 'image/png' ];
$allowed_extensions = [ 'jpg', 'jpeg', 'png' ];

function get_file_path( string $filename, string $path ): string {
	$basename  = pathinfo( $filename, PATHINFO_FILENAME );
	$extension = pathinfo( $filename, PATHINFO_EXTENSION );
	$basename  = preg_replace( '/[^A-z0-9]/', '-', $basename );
	$i         = 0;
	while ( file_exists( $path . $filename ) ) {
		$i ++;
		$filename = $basename . $i . '.' . $extension;
	}

	return __DIR__ . '/uploads/' . $filename;
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	// Auslesen des Bildes
	$image = $_FILES['image'] ?? null;
	// Kontrolle, ob das Bild zu groß ist
	$error = $image['error'] === 1 ? 'Image is too big ' : '';
	if ( $image['error'] === UPLOAD_ERR_OK ) {
		$error = $image['size'] > $max_file_size ? 'File too large ' : '';
		// Kontrolle ob der Mime-Type des Bildes erlaubt ist
		$typ   = mime_content_type( $image['tmp_name'] );
		$error .= in_array( $typ, $allowed_types, true ) ? '' : 'File type not allowed';
		// Kontrolle, ob die Dateierweiterung erlaubt ist
		$extension = pathinfo( strtolower( $image['name'] ), PATHINFO_EXTENSION );
		$error     .= in_array( $extension, $allowed_extensions, true ) ? '' : 'File extension not allowed ';
		// Verschieben des Bildes in den Upload-Ordner
		if ( ! $error ) {
			$filename    = $image['name'];
			$destination = get_file_path( $filename, $upload_dir );
			$moved       = scale_and_copy( $image['tmp_name'], $destination );
			//Ersetzen: move_uploaded_file( $image['tmp_name'], $destination );
		}
	} else {
		echo 'Sorry, there was an Error: ' . $image['error'];
	}
}
?>
<?php include 'header.php'; ?>
    <main>
        <h3>File Upload</h3>
        <form action="form.php" method="POST" enctype="multipart/form-data">
            <label for="image">Upload file:
                <input type="file" name="image" id="image" accept="image/*">
            </label>
            <span style="color: red"><?= e( $error ) ?></span>
            <input type="submit" value="Upload">
        </form>
			<?php if ( $moved ?? false ): ?>
          <p>File uploaded to: <?= e( $destination ?? '' ) ?></p>
			<?php endif; ?>
    </main>

<?php

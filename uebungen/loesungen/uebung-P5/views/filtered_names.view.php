<?php
include_once './includes/functions.php';
include_once './includes/filtered_names.php';

?>
<ul>
	<?php if ( ! empty( $filtered_persons ) ) : ?>
		<?php foreach ( $filtered_persons as $person ): ?>
            <li>
                <a href="#">
					<?php echo e( $person['first_name'] ) . " " . e( $person['last_name'] ); ?>
                </a>
            </li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>

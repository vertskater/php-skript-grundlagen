<?php
include_once './includes/functions.php';
include_once './includes/filtered_names.php';
include './views/header.php';

if ( ! empty( $filtered_persons ) ) : ?>
    <h3>Namen die mit <?= $_GET['char'] ?> beginnen</h3>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Birthdate</th>
        </tr>
        </thead>
		<?php foreach ( $filtered_persons as $person ): ?>
            <tbody>
            <tr>
                <td>
					<?php echo e( $person['first_name'] ); ?>
                </td>
                <td>
					<?php echo e( $person['last_name'] ); ?>
                </td>
                <td>
					<?php echo e( $person['birthdate'] ); ?>
                </td>
            </tr>
            </tbody>
		<?php endforeach; ?>
    </table>
<?php endif;
include './views/footer.php';
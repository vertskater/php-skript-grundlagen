<?php
include 'header.php';
require_once 'inc/objects.php';
if ( isset( $henrik_dev ) ) {
	$dev = $henrik_dev;
}
?>
<main style="padding: 0">
    <h3><?= $dev->getName(); ?></h3>
    <a href="mailto:<?= str_replace( " ", ".", strtolower( $dev->getName() ) ) ?>@company.at">E-Mail: <?= $dev->getEmail(); ?></a>
    <p>Skills: <?= implode( ', ', $dev->getSkills() ); ?></p>
    <h4>Assigned Projects</h4>
    <ul>
			<?php
			if ( isset( $claudia ) ) {
				foreach ( $dev->getAssignedProjects( $claudia->getProjects() ) as $project ) {
					echo '<li>' . $project->getName() . ' - Fortschritt: <progress value="' . $project->getProgress() . '" max="100"></progress></li>';
				}
			}
			?>
    </ul>
    <a href="index.php"><-- Back to Main</a>
</main>
<?php include 'footer.php' ?>

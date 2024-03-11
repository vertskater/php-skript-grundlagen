<?php
// Hier kommt der PHP-Code
global $claudia;
include 'header.php';
include 'inc/objects.php';
$devs = [];
?>
<main style="padding: 0">
    <h2>Teamleader:in: <?= $claudia->getName() ?></h2>
    <h3>Projekte</h3>
    <ul>
			<?php foreach ( $claudia->getProjects() as $project ): ?>
          <li>
						<?= $project->getName() ?> - Fortschritt:
              <progress value="<?= $project->getProgress(); ?>" max="100"></progress>
          </li>
			<?php endforeach; ?>
    </ul>
    <h3>Entwickler:innen</h3>
    <ul>
			<?php
			foreach ( $claudia->getProjects() as $project ) {
				foreach ( $project->getDevelopers() as $dev ) {
					if ( ! in_array( $dev, $devs, true ) ) {
						$devs[] = $dev;
					}
				}
			}
			foreach ( $devs as $dev ) {
				echo '<li><a href="' . str_replace( " ", "", strtolower( $dev->getName() ) ) . '.php">' . $dev->getName() . ' - Skills: ' . implode( ', ', $dev->getSkills() ) . '</a></li>';
			}
			?>
    </ul>
</main>
<?php include 'footer.php'; ?>


<main style="padding: 0">
    <h2>Teamleitung: <?= $claudia->getName() ?></h2>
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
				echo '<li><a href="views/developer.view.php">' . $dev->getName() . ' - Skills: ' . implode( ', ', $dev->getSkills() ) . '</a></li>';
			}
			?>
    </ul>
</main>
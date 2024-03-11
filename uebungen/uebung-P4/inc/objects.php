<?php
require_once '../uebung-P4/TeamLeader.php';
require_once '../uebung-P4/Developer.php';
require_once '../uebung-P4/Project.php';

// Erstelle Objekt Instanzen
$claudia    = new TeamLeader( 'Claudia Leader', 'claudia.leader@company.at' );
$henrik_dev = new Developer( 'Henrik Dev', 'henrik.dev@company.at' );
$henrik_dev->addSkill( 'PHP' );
$henrik_dev->addSkill( 'Backend' );
$amilia_dev = new Developer( 'Amilia Dev', 'amilia.dev@company.at' );
$amilia_dev->addSkill( 'JavaScript' );
$amilia_dev->addSkill( 'Frontend' );

// Füge 5 Projekte hinzu
for ( $i = 1; $i <= 5; $i ++ ) {
	$claudia->addProject( new Project( "Project $i" ) );
}
// Füge Developer zu Projekten hinzu
$claudia->setDeveloper( $henrik_dev, $claudia->getProjects()[0]->getId() );
$claudia->setDeveloper( $amilia_dev, $claudia->getProjects()[0]->getId() );
$claudia->setDeveloper( $henrik_dev, $claudia->getProjects()[3]->getId() );
$claudia->setDeveloper( $amilia_dev, $claudia->getProjects()[4]->getId() );

$henrik_dev->progress( $henrik_dev->getAssignedProjects( $claudia->getProjects() )[0], 50 );
$amilia_dev->progress( $amilia_dev->getAssignedProjects( $claudia->getProjects() )[1], 76 );

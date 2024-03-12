<?php
require_once dirname( __DIR__ ) . '/TeamLeader.php';
require_once dirname( __DIR__ ) . '/Developer.php';
require_once dirname( __DIR__ ) . '/Project.php';

// Erstelle Objekt Instanzen von Teamleader
$claudia = new TeamLeader( 'Claudia Leader', 'claudia.leader@company.at' );
// Erstelle Objekt Instanzen von Developer und füge Skills hinzu
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
// Fortschritt der Projekte
$henrik_dev->progress( $henrik_dev->getAssignedProjects( $claudia->getProjects() )[0], 50 );
$amilia_dev->progress( $amilia_dev->getAssignedProjects( $claudia->getProjects() )[1], 76 );

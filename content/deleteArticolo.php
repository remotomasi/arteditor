<?php

ob_start();

require_once '../includes/init.php';
require_once '../includes/classes/articolo.php';
require_once '../includes/classes/database.php';
loadContent('../content/', 'articoli');

	$accessLevel = $_SESSION['level'];
	echo 'Livello: ' . $accessLevel;

	if ($accessLevel == '1') :
		if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
			$art = new Articolo();
			$art::deleteArticoloByID($_GET['id_articolo']);
		}
	endif;	
	
	header("Location: ../index.php");
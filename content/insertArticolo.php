<?php

ob_start();

require_once '../includes/init.php';
require_once '../includes/classes/articolo.php';
require_once '../includes/classes/database.php';
loadContent('../content/', 'articoli');

	$accessLevel = $_SESSION['level'];
	//echo 'Livello: ' . $accessLevel;

	if ($accessLevel == '1') :
		if (isset($_POST['save']) AND $_POST['save'] == 'Save') {
			$art = new Articolo();
			$art::insertArticolo($_POST['titolo'], $_POST['contenuto'], 1);
		}
	endif;

	header("Location: ../index.php");
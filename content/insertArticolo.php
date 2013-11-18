<?php

require_once '../includes/init.php';
require_once '../includes/classes/articolo.php';
require_once '../includes/classes/database.php';
loadContent('../content/', 'articoli');

	//__autoload('articolo');

	if (isset($_POST['save']) AND $_POST['save'] == 'Save') {
		$art = new Articolo();
		$art::insertArticolo($_POST['titolo'], $_POST['contenuto'], 1);
	}
	
	header("Location: ../index.php");
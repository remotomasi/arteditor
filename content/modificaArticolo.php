<?php

require_once '../includes/init.php';
require_once '../includes/classes/articolo.php';
require_once '../includes/classes/database.php';
loadContent('../content/', 'articoli');

	$accessLevel = $_SESSION['level'];
	//echo 'Livello: ' . $accessLevel;

	if ($accessLevel == '1') :
		if (isset($_POST['modifica']) AND $_POST['modifica'] == 'Modify') {
			$art = new Articolo();
			$art::modificaArticolo($_POST['id_articolo'], $_POST['titolo'], $_POST['contenuto']);
		}
	endif;
	
	//echo $_POST['id_articolo'], $_POST['titolo'], $_POST['contenuto'], $_POST['modifica'];
	
	header("Location: ../index.php");
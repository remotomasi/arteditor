<?php 
	require_once '../includes/init.php';
	require_once '../includes/classes/articolo.php';
?>

<?php

	//__autoload('articolo');

	if (isset($_POST['save']) AND $_POST['save'] == 'Save') {
		$art = new Articolo();
		Articolo::insertArticolo($_POST['titolo'], $_POST['contenuto'], 0);
	}
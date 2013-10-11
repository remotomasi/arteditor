<?php
if (isset($_POST['save']) AND $_POST['save'] == 'Save') {

	Articolo::insertArticolo($_POST['titolo'], $_POST['contenuto'], 0);
}


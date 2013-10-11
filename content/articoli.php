<?php
/**
 * articoli.php
*
* Content for Articoli page
*
* @version    1.2 2011-02-03
* @package    Arteditor
* @copyright  Copyright (c) 2011 Remo Tomasi
* @license    GNU General Public License
* @since      Since Release 1.0
*/
include 'includes/classes/articolo.php';
// Get the articolo information
$items = Articolo::getArticoli();
//$authorarts = Articolo::getAutoreArticolo(1);

if (empty($items)) {
	$items = array();
}

if (empty($authorarts)) {
	$authorarts = array();
}
?>

<?php foreach ($items as $i=>$item) : ?>
	<h2><?php echo htmlspecialchars($item->getTitolo()); ?></h2>
	<p>Postato il <?php echo substr(htmlspecialchars($item->getDataPubblicazione()), 0, 10); ?>	
	by <?php 
				$authorarts = Articolo::getAutoreArticolo(htmlspecialchars($item->getIDArticolo()));
				foreach ($authorarts as $authorart) {
					echo '<i><b>' . $authorart['Cognome'] . ' ' . $authorart['Nome'] . '</b></i>';
				} ?></p>
	<p><?php echo htmlspecialchars($item->getContenuto()); 	
			if (sizeof($items) > 1) {
				echo '<br /><hr>';
			}
			else echo '<br />';?></p>
<?php endforeach; ?>
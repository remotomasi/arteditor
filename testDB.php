<?php 
/**
 * index.php
 *
 * Main file
 *
 * @version    0.1 2013-09-12
 * @package    Arteditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
require_once 'includes/classes/database.php';
?>
<?php
	$connection = Database::getConnection();
	if ($result = $connection->query("SELECT DATABASE()")) {
		$row = $result->fetch_array(MYSQLI_NUM);
		echo '<p>*** Using database ' .  $row[0] . ' ***</p>';
	}
	else echo '<p> Ciao!</p>'
?>
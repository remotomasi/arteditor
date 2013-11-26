<?php
	if(!isset($_SESSION)){
	    session_start();
	} // starts new or resumes existing session 
?>
<?php
require_once "includes/classes/articolo.php";
// Get the articolo information
$items = Articolo::getArticoli();
//$authorarts = Articolo::getAutoreArticolo(1);

if (empty($items)) {
	$items = array();
}

if (empty($arts)) {
	$arts = array();
}
?>

<ul class="ulfancy">
	<?php foreach ($items as $i=>$item) : ?>
	<li class="row<?php echo $i % 2; ?>">
		<h2><?php echo htmlspecialchars($item->getTitolo()); ?></h2>
		<p>Postato il <?php echo substr(htmlspecialchars($item->getDataPubblicazione()), 0, 10); ?>	
		by <?php 
			$arts = Articolo::getAutoreArticolo(htmlspecialchars($item->getIDArticolo()));
			foreach ($arts as $art) {
				echo '<i><b>' . $art['Cognome'] . ' ' . $art['Nome'] . '</b></i>';
			} ?></p>
			<p class="contentArt"><?php echo htmlspecialchars($item->getContenuto()); ?></p>
			<a href="modify_posts.php?post_id=<?php echo $art['id_articolo']?>&action=edit">Edit</a> ||
			<a href="modify_posts.php?post_id=<?php echo $art['id_articolo']?>&action=delete">Delete</a> ||
			<a href="modify_comment.php?post_id=<?php echo $art['id_articolo']?>&action=add">Add a comment</a>
	</li>
	
	<?php endforeach; ?>
</ul>
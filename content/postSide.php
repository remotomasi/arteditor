<?php
	if(!isset($_SESSION)){
	    session_start();
	} // starts new or resumes existing session 
?>
	
<?php 
require_once "includes/classes/articolo.php";
// Get the articolo information
$items = Articolo::getArticoli();

if (empty($items)) {
	$items = array();
}

if (empty($arts)) {
	$arts = array();
}
?>

<ul id="navLat" >
    <li class="expandButton" ><a href="#">Gennaio</a>
		<ul id="postSideArt" class="postSideArt">
		<?php foreach ($items as $i=>$item) : ?>
			<li><h6><a href="index.php?page=1&idArticolo='<?php echo htmlspecialchars($item->getIDArticolo()); ?>'"><?php echo htmlspecialchars($item->getTitolo()); ?></a></h6></li>
		<?php endforeach; ?>
		</ul>
	</li>
</ul>

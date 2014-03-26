<?php
	if(!isset($_SESSION)){
	    session_start();
	} // starts new or resumes existing session 
?>
	
<?php 
require_once "includes/classes/articolo.php";
require_once "utility.php";
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

<!-- 
	<li>
		<!-- ?php
			$arts = Articolo::getAnnoMeseArticoli();
			//$arts = Articolo::getAutoreArticoloByIDArticolo(21);
			if (!empty($arts)){
				foreach ($arts as $art) {
					?><li><h6><a href="'<?php echo '<i><b>' . $art['anno'] . ' ' . $art['mese'] . ' ' . '</b></i>'; ?></a></h6></li>
				<!-- ?php 
				}
					}else{
					echo "Vuoto!";
				}
		?>
    </li>
-->
<!--     <li class="expandButton" ><a href="#">Gennaio</a>
		<ul id="postSideArt" class="postSideArt"> -->
		<?php 
			$month = "";
			$year = "";
		?>
		<?php foreach ($items as $i=>$item) : ?>
				<?php if ($month == htmlspecialchars(monthName($item->getDataPubblicazione())) &&
							$year == htmlspecialchars(year($item->getDataPubblicazione()))) { ?>
						<ul id="postSideArt<?php echo $month . '-' . $year; ?>" class="postSideArt">
							<li>
								<h6><a href="index.php?page=1&idArticolo='<?php echo htmlspecialchars($item->getIDArticolo()); ?>'"><?php echo htmlspecialchars($item->getTitolo());  ?></a></h6>
							</li>
						</ul>
						<?php 
					  }
				  	  else {
						$month = htmlspecialchars(monthName($item->getDataPubblicazione()));
						$year = htmlspecialchars(year($item->getDataPubblicazione()));
						?>			
						<li class="expandButton" >
							<a href="#">
					  	  		<?php echo $month . '-' . $year; ?>
							</a>							
							<ul id="postSideArt<?php echo $month . '-' . $year; ?>" class="postSideArt">
								<li>
									<h6><a href="index.php?page=1&idArticolo='<?php echo htmlspecialchars($item->getIDArticolo()); ?>'"><?php echo htmlspecialchars($item->getTitolo());  ?></a></h6>
								</li>
							</ul>			
						</li>
						<?php 
					  }
				?>
		<?php endforeach; ?>
<!-- 		</ul>
	</li> -->
</ul>


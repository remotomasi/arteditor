<head>
	<script type="text/javascript">
		/*<![CDATA[*/
		
		function cancella(id_articolo){
		
			var messaggio = 'Stai per confermare la cancellazione del post.';
		
			var scelta = confirm(messaggio);
		
			if (scelta == true)
			{
				self.location.href = 'content/deleteArticolo.php?id_articolo=' + id_articolo + '&action=delete';
			}
		}	
			
		function modifica(id_articolo, titolo, contenuto){

			var messaggio = 'Vuoi modificare il post selezionato?';
			
			var scelta = confirm(messaggio);
			
			if (scelta == true)
			{
				self.location.href = 'edit.php?id_articolo=' + id_articolo + '&titolo=' + titolo + '&contenuto=' + contenuto + '&action=modify';
			}
		}
		
		/*]]>*/
	</script>
</head> 

<?php
	if(!isset($_SESSION)){
	    session_start();
	} // starts new or resumes existing session 
?>
<?php
//$authorarts = Articolo::getAutoreArticolo(1);

if (empty($items)) {
	$items = array();
}

if (empty($arts)) {
	$arts = array();
}
?>

<?php 
	if (!empty($_GET['idArticolo'])) : ?>
	<?php 
		$id = $_GET['idArticolo'];
		$articolo = Articolo::getArticoloByID($id);
	?>
	<h2><?php echo htmlspecialchars($articolo->getTitolo()); ?></h2>
	<p>Postato il <?php echo substr(htmlspecialchars($articolo->getDataPubblicazione()), 0, 10); ?>	
	by <?php 
	//echo $item->getIDArticolo();
	//$arts = Articolo::getAutoreArticoloByIDArticolo(htmlspecialchars('2'));
	$arts = Articolo::getAutoreArticoloByIDArticolo(htmlspecialchars($articolo->getIDArticolo()));
	if (!empty($arts)){
		foreach ($arts as $art) {
			echo '<i><b>' . $art['Cognome'] . ' ' . $art['Nome'] . '</b></i>';
		}
			}else{
			echo "Vuoto!";
		}
									
?></p>

<p class="contentArt"><?php echo htmlspecialchars($articolo->getContenuto()); ?></p>
<?php if (isset($_SESSION['nome']) && (isset($_SESSION['level']) && $_SESSION['level'] == '1')) {?>
<a href="" onclick="modifica(<?php echo $art['id_articolo']?>, '<?php echo $articolo->getTitolo();?>', '<?php echo $articolo->getContenuto();?>'); return false;">Edit</a> ||
<a href="" onclick="cancella(<?php echo $art['id_articolo']?>); return false;">Delete</a> ||					
<?php } ?>
<a href="modify_comment.php?post_id=<?php echo $articolo->getIDArticolo(); //$art['id_articolo']?>&action=add">Add a comment</a>

<?php 	else:	

// numero totale di articoli
$countArt = Articolo::getCountArticoli();

// risultati per pagina
$perPage = 5;

// numero totale di pagine
if (!empty($countArt)){
	foreach ($countArt as $count) {
		$count = $count['count'];
	}
}
$tot_pages = ceil((int)$count / $perPage);

// pagina corrente
//$current_page = 0;
$current_page = $_GET['page'];


// primo parametro di LIMIT
$primo = ($current_page -1) * $perPage;

// Get the articolo information
$items = Articolo::getArticoliPerPagina($primo, $perPage);
?>
<ul class="ulfancy">
	<?php foreach ($items as $i=>$item) : ?>
	<li class="row<?php echo $i % 2; ?>">
		<h2><?php echo htmlspecialchars($item->getTitolo()); ?></h2>
		<p>Postato il <?php echo substr(htmlspecialchars($item->getDataPubblicazione()), 0, 10); ?>	
		by <?php 
			//echo $item->getIDArticolo();
			//$arts = Articolo::getAutoreArticoloByIDArticolo(htmlspecialchars('2'));

			$arts = Articolo::getAutoreArticoloByIDArticolo(htmlspecialchars($item->getIDArticolo()));
			if (!empty($arts)){
				foreach ($arts as $art) {
					echo '<i><b>' . $art['Cognome'] . ' ' . $art['Nome'] . '</b></i>';
				}
			}else{
				echo "Vuoto!";
			}
			
			?></p>
			
			<p class="contentArt"><?php echo htmlspecialchars($item->getContenuto()); ?></p>
			<?php if (isset($_SESSION['nome']) && (isset($_SESSION['level']) && $_SESSION['level'] == '1')) {?>
			<a href="" onclick="modifica(<?php echo $art['id_articolo']?>, '<?php echo $item->getTitolo();?>', '<?php echo $item->getContenuto();?>'); return false;">Edit</a> ||
			<a href="" onclick="cancella(<?php echo $art['id_articolo']?>); return false;">Delete</a> ||					
			<?php } ?>
			<a href="modify_comment.php?post_id=<?php echo $item->getIDArticolo(); //$art['id_articolo']?>&action=add">Add a comment</a>
	</li> 
	<?php endforeach; ?>	
	
	<?php 
	
	$paginazione = "Pagine totali: " . $tot_pages . "[";
	for($i = 1; $i <= $tot_pages; $i++) {
		if($i == $current_page) {
			$paginazione .= $i . " ";
		} else {
			$paginazione .= "<a href=\"?page=$i\" title=\"Vai alla pagina $i\">$i</a>";
		}
	}
	$paginazione .= "]";
	
	// in questa cella inseriamo la paginazione
	echo "$paginazione";
	
	?>
</ul>

<?php 
	endif;
?>
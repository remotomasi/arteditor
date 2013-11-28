<?php
	if(!isset($_SESSION)){
	    session_start();
	} // starts new or resumes existing session 
?>
<header>
	<nav>
		<ul>
			<li><h2>ArtEditor</h3>
			<li><h6><a href="index.php">Blog</a></h6></li>
			<?php if (isset($_SESSION['nome']) && (isset($_SESSION['level']) && $_SESSION['level'] == '1')) {?>
			<li><h6><a href="insert.php">Insert</a></h6></li>			
			<?php } ?>
			<?php if (isset($_SESSION['nome'])) {?>
			<li><h6><a href="delete.php">Delete</a></h6></li>
			<?php } ?>
			<li><h6><a href="#">Contatti</a></h6></li>
			<li><h6><a href="about.php">About</a></h6></li>
			<?php if (isset($_SESSION['nome'])) {?>
			<li><h6><a href="exit.php">Logout</a></h6></li>
			<?php } ?>
			<li><p><?php 
				if (isset($_SESSION['nome'])) {
					$_SESSION['nome'] . ' ' . $_SESSION['cognome'];
				} else {

				}
			?><p></li>
		</ul>
	</nav>
</header>
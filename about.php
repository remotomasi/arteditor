<?php 
/**
 * about.php
 *
 * About file
 *
 * @version    0.1 2013-11-26
 * @package    Arteditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ArtEditor - About</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<html>
	<body>
		<div id="container">
		<?php include 'content/header.php'; ?>
					
			<div id="content">
				<div id="mainContent">		
					<section>
						<article class="articolo">
							<header>
								<fieldset>
									<h3></h3><h3></h3><h3></h3>
									<h3>About page.</h3>
									<hr>
									<p>This is the about page that contain some information on ArtEditor.</p>
									<p>In the future it will be updated and some other feature will be added.</p>	 
									<p></p>
									<p><b>Nome:</b> ArtEditor v. 0.1</p>
									<p></p>
									<p><b>Data di ideazione:</b> Luglio 2013</p>
									<p></p>
									<p><b>Data di concretizzazione:</b> Agosto 2013</p>	
									<p></p>
									<p><b>Ultimo aggiornamento:</b> Novembre 2013</p>							
								</fieldset>
							</header>
						</article>
					</section>		
				</div>
				<aside>
					<?php include "content/login.php"; ?>
			        <fieldset id="inputs">
						<header>
							<h4>Post Vari</h4>
						</header>
						<div id="postSide">
							<?php include 'content/postSide.php';?>
						</div>
					</fieldset>
				</aside>
			</div>
		</div>
		<?php include 'content/footer.php';	?>
	</body>
</html>

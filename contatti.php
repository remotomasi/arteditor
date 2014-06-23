<?php 
/**
 * contatti.php
 *
 * Contatti file
 *
 * @version    0.1 2014-06-19
 * @package    Arteditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ArtEditor - Contatti</title>
	<link href="css/main.css" rel="stylesheet" type="text/css" />
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery-1.6.1.min.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery.effects.core.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery.effects.blind.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/nav.js"></script>
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
									<h3>Contatti page.</h3>
									<hr>
									<p>This is the about page that contain some information on the Autor.</p>
									<p>In the future it will be updated and some other feature will be added.</p>	 
									<p></p>
									<p><b>Nome:</b> Remo</p>
									<p></p>
									<p><b>Cognome:</b> Tomasi</p>
									<p></p>							
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

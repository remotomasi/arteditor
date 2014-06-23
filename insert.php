<?php
/**
 * insert.php
 *
 * Insert file
 *
 * @version    0.1 2014-06-23
 * @package    ArtEditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ArtEditor - Insert</title>
	<link href="css/main.css" rel="stylesheet" type="text/css" />
	<script language="Javascript" src="js/controllo.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery-1.6.1.min.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery.effects.core.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery.effects.blind.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/nav.js"></script>

</head>
<body>
	<div id="container">
		<?php include 'content/header.php';?>	
		<?php
			if (!isset($_SESSION['nome']) || (isset($_SESSION['level']) && $_SESSION['level'] != '1')) :
			?>
			<br /><br /><p></p>
			<fieldset>
	 		<?php 
		 		echo 'Sorry, no access allowed to this page';
			?>
			</fieldset>
			<?php 
			else : 
		?>		
		<div id="content">
			<div id="mainContent">
				<section>
					<article class="articolo">
						<header>
							<fieldset>
								<h3></h3><h3></h3><h3></h3>
								<h3>Insert Article</h3>
								<hr>
								<p>This is the about page the possibility to add an article in the blog.</p>
								<p>In this page you can insert the essential datas to create a new post.</p>	 
								<p></p>
							</fieldset>
						</header>
						<header>
							<form action="content/insertArticolo.php" method="post">
								<fieldset>
									<legend><i>Inserimento post</i></legend>
										
										<ul>
											<li><label for="Titolo">Titolo</label><br />
											<input type="text" id="titolo" name="titolo" onkeyup="enableSubmit()"/></li>
											<li><label for="Contenuto">Contenuto</label><br />
											<textarea id="contenuto" name="contenuto" rows="10" cols="77" onkeyup="enableSubmit()">
											</textarea></li>
										</ul>
													
										<input type="submit" id="save" name="save" value="Save" disabled="disabled"/>
								</fieldset>
							</form>
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
	<?php endif; ?>
</div><!-- end container -->
<br />
	<?php include 'content/footer.php';?>
</body>
</html>
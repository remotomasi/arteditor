<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ArtEditor - Insert</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="container">
		<?php include 'content/header.php';?>	
		<?php
			//require_once 'includes/classes/utente.php';
			
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
								<h3>Editing Article</h3>
								<hr>
								<p>This is the about page the possibility to edit an article in the blog.</p>
								<p>In this page you can edit the essential datas to modify a post.</p>	 
								<p></p>
							</fieldset>
						</header>
						<header>
							<form action="content/modificaArticolo.php" method="post">
								<fieldset>
									<legend><i>Modifica post</i></legend>
										
										<ul>
											<li><label for="Titolo">Titolo</label><br />
											<input id="titolo" name="titolo" type="text" value="<?php echo $_GET['titolo']?>"/></li>
											<li><label for="Contenuto">Contenuto</label><br />
											<textarea id="contenuto" name="contenuto" rows="10" cols="77"><?php echo $_GET['contenuto']?>
											</textarea>
											<input type="hidden" id="id_articolo" name="id_articolo" value="<?php echo $_GET['id_articolo']?>" />
											</li>
										</ul>													
										<input type="submit" name="modifica" value="Modify" />
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
<?php 
/**
 * delete.php
 *
 * Delete file
 *
 * @version    0.1 2013-11-26
 * @package    Arteditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
require_once 'includes/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ArtEditor - Delete</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="container">
		<?php include 'content/header.php';?>		
		<?php 
			if (!isset($_SESSION['nome'])) :
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
								<h3>Delete Article</h3>
								<hr>
								<p>This is the about page the possibility to delete an article in the blog. In this page you can indicate the post you want to delete.</p>	 
								<p></p>
							</fieldset>
						</header>
						<header>
							<form action="content/insertArticolo.php" method="post">
								<fieldset>
									<legend><i>Post to cancel</i></legend>
										
										<ul>
											<li><label for="Elenco">Elenco</label><br /></li>											
										</ul>
													
										<input type="submit" name="delete" value="Delete" />
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
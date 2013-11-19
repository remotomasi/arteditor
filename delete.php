<?php
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
				<fieldset id="actions">
					
				</fieldset>
			</aside>
		</div>
</div><!-- end container -->
	<?php include 'content/footer.php';?>
</body>
</html>
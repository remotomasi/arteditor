<?php
?>

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
		
		<div id="content">
			<div id="mainContent">
				<section>
					<article class="articolo">
						<header>
							<fieldset>
								<h3>Insert Article</h3>
								<hr>
								<p>This is the about page the possibility to add an article in the blog. In this page you can insert the essential datas to create a new post.</p>	 
								<p></p>
							</fieldset>
						</header>
						<header>
							<?php include 'content/modInsert.php'?>
						</header>
					</article>
				</section>	
			</div>
			<aside>
				<fieldset id="actions">
					
				</fieldset>
			</aside>
		</div>

	<footer>
		<?php include 'content/footer.php';?>
	</footer>

</div><!-- end container -->
</body>
</html>
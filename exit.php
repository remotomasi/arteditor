<?php 
/**
 * exit.php
 *
 * Main file
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
	<title>ArtEditor</title>
	<link href="css/main.css" rel="stylesheet" type="text/css" />
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery-1.6.1.min.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery.effects.core.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/jquery.effects.blind.js"></script>
 	<script type="text/javascript" language="javascript" charset="utf-8" src="js/nav.js"></script>
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
							<?php include 'content/logout.php';?>
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
	<?php endif; ?>
	</div><!-- end container -->
<br />
</div>
	<?php include 'content/footer.php';?>
</body>
</html>
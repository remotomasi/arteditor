<?php 
/**
 * index.php
 *
 * Main file
 *
 * @version    0.1 2013-09-12
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
							<?php loadContent('content/', 'articoli'); ?>	 
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
		
	<!--
	<div class="message">
    	<!-- ?php echo $message; ?
  	</div> -->
  	<!-- end message -->  
		
	<!-- div class="message"-->
  	  <?php 
	/*  $connection = Database::getConnection();
	  	  if ($result = $connection->query("SHOW TABLES")) {
	  	  	$count = $result->num_rows;
	  	  	echo "Tables: ($count)<br />";
	  	  	//while ($row = $result->fetch_array()) {
			//	echo $row[0]. '<br />';
			//}
			//
	  	  }
	  	  else echo '<p> Ciao!</p>' */
      ?>
	<!-- /div --><!-- end message -->
	
	<!-- <div class="content">
	</div> --><!-- end content -->
	

</div><!-- end container -->

	<?php include 'content/footer.php';?>
</body>
</html>

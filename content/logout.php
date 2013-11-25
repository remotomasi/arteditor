<?php
/**
 * logout.php
 * 
 * Logout
 * 
 * @version    0.1 2013-11-22
 * @package    Arteditor
 * @copyright  Copyright (c) 2013 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
?>
<h1>Logout</h1>

<form action="index.php" method="post" name="maint" id="maint">
	<fieldset class="mainform">
		<legend>Logout</legend>
		<p>Sei sicuro di voler uscire,
			<?php echo $_SESSION['nome'];
		?>?</p>
		<?php 
		
		// create token
		$salt = 'SomeSalt';
		$token = sha1(mt_rand(1,1000000) . $salt);
		$_SESSION['token'] = $token;
		?>
		
		<input type="hidden" name="task" id="task" value="logout" />
    	<input type='hidden' name='token' value='<?php echo $token; ?>'/>
    	<input type="submit" name="logout" value="Logout" />
    	<a class="cancel" href="../arteditor/index.php">Cancel, return to Home Page</a>
	</fieldset>
</form>
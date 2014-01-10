<?php
	if(!isset($_SESSION)){
	    session_start();
	} // starts new or resumes existing session 
?>
<h3>Logout</h3>

<form action="index.php?page=1" method="post" name="maint" id="maint">
	<fieldset class="mainform">
		<!-- <legend>Logout</legend> -->
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
    	<a class="cancel" href="../arteditor/index.php?page=1">Cancel, return to Home Page</a>
	</fieldset>
</form>
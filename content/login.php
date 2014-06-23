<?php
	if(!isset($_SESSION)){
	    session_start();
	} // starts new or resumes existing session 
?>
<?php 
	if (!isset($_SESSION['nome'])) {	
?>
    <fieldset id="actions">
		<header>
			<h4>Login</h4>
			<p />
		</header>
		<form action="index.php?page=1" method="post" id="maint" name="maint">
	   		<input id="username" name="username" type="text" placeholder="Username" autofocus required>
	    	<input id="password" name="password" type="password" placeholder="Password" required>
	      	
	      	<?php 
	       		// create token
	       		$salt = 'SomeSalt';
				$token = sha1(mt_rand(1,1000000) . $salt);
				$_SESSION['token'] = $token;
	    	?>    
	       	
	   		<input type="hidden" id="task" name="task" value="login" />
	   		<input type="hidden" id="token" name="token" value="<?php echo $token; ?>" />
	    	<input type="submit" id="submit" name="login" value="Login">
	    	<a href="../arteditor/index.php?page=1" id="back">Home Page</a>
	   	</form>
	</fieldset>
			<?php 
				} else {
			?>
			<!-- <p><b>Utente:</b> -->
			<?php 
				//echo $_SESSION['nome'] . ' ' . $_SESSION['cognome'];
			?>
			<?php 
				}
			?>
	    	<p />
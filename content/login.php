<?php
?>
	<form action="index.php" method="post" id="maint" name="maint">
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
       	<input type="submit" id="submit" name="Login" value="Login">
       	<a href="../arteditor/index.php" id="back">Home Page</a>
   	</form>
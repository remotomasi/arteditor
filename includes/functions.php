<?php
/**
 * loadContent
 * Load the Content
 * @param $default
 */
function loadContent($where, $default='') {
  // Get the content from the url 
  // Sanitize it for security reasons
  $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
  $default = filter_var($default, FILTER_SANITIZE_STRING);
  // If there wasn't anything on the url, then use the default
  $content = (empty($content)) ? $default : $content;
  // If you found have content, then get it and pass it back
  if ($content) {
  	// sanitize the data to prevent hacking.
  	$html = include $where.$content.'.php';	// 'content/'
  }
  return $html;
}

function userLogin() {
	$results = '';
	if (isset($_POST['login']) AND $_POST['login'] == 'Login') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);

			$item  = array ( 'username'  => filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING),
					'password'     => filter_input(INPUT_POST,'password')
			);

			// login
			$results = Utente::logIn($item);
		}
	}
	return $results;
}

function userLogout() {
	$results = '';
	if (isset($_POST['logout']) AND $_POST['logout'] == 'Logout') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.', '');
			$badToken = true;
		} else {
			// logout
			$badToken = false;
			unset($_SESSION['token']);

			Utente::logout();	// unset di tutte le variabili utente
			$results = array('',"You have successfully logged out",'');;
		}
	}
	return $results;
}
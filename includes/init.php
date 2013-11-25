<?php
/**
 * init.php
 *
 * Initialization file
 *
 * @version    0.1 2013-09-17
 * @package    Arteditor
* @copyright   Copyright (c) 2011 Remo Tomasi
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */

session_start(); // starts new or resumes existing session
define('MAGIC_QUOTES_ACTIVE', get_magic_quotes_gpc());
define('SITE_KEY', 'd0d48339c3b82db413b3be8fbc5d7ea1c1fd3e2792605d3cbfda1HEM54!!');

// include required files
require_once 'functions.php';

// Initialize message coming in
$message = '';
if (isset($_SESSION['message'])) {
	$message = htmlentities($_SESSION['message']);
	unset($_SESSION['message']);
}
// Process based on the task. Default to display
$task = filter_input(INPUT_POST,'task', FILTER_SANITIZE_STRING);
switch ($task) {

	case 'login' :
		// process the login
		$results = userLogin();
		$message .= $results[1];
		// If there is redirect information
		// redirect to that page
		// pass on new messages
		if ($results[0] == 'login') {
			// pass on new messages
			if ($results[1]) {
				$_SESSION['message'] = $results[1];
			}
			header("Location: index.php?content=login");
			exit;
		}
		break;

	case 'logout' :
		// process the login
		$results = userLogout();
		$message .= $results[1];
		// If there is redirect information
		// redirect to that page
		// pass on new messages
		if ($results[0] == 'logout') {
			// pass on new messages
			if ($results[1]) {
				$_SESSION['message'] = $results[1];
			}
			header("Location: index.php?content=logout]");
			exit;
		}
		break;
}

/**
 * Auto load the class files
 * @param string $class_name
 */
function __autoload($class_name) {
	try {
		$class_file = 'classes/' . strtolower($class_name) . '.php';
		if (is_file($class_file)) {
			require_once $class_file;
		} else {
			throw new Exception("Unable to load class $class_name in file $class_file.");
		}
	} catch (Exception $e) {
		echo 'Exception caught: ',  $e->getMessage(), "\n";
	}
}

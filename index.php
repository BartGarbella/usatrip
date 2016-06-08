<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location:/index.php');
}else{
	require_once(__DIR__.'/include/config.php');
}


?>

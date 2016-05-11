<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location:/index.php');
}else{
	require_once(__DIR__.'/include/config.php');
}


?>

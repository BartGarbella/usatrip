<?php 

require_once 'functions.php';

function autoloader($class) {
	include 'classes/'. $class . '.class.php';
}


spl_autoload_register('autoloader');

// var_dump($_POST);
// exit;





if(isset($_POST['render'])) {
	$template = new Template();
	$result = $template->renderPartial($_POST['render']);
	echo $result ;
}



if(isset($_POST['submit'])) {
	$template = new Query();
	$result = $template->decode($_POST['submit']);
	echo $result;
}
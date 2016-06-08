<?php 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'functions.php';

function autoloader($class) {
	include 'classes/'. $class . '.class.php';
}


spl_autoload_register('autoloader');

// var_dump($_POST);
// exit;





if(isset($_POST['render'])) {
	$result = array('render' => '');
	$template = new Template();
	$result['render'] = $template->renderPartial($_POST['render']);
	echo json_encode($result);
}



if(isset($_POST['submit']) || isset($_POST['update'])) {
	$result = array('info' => '');
	$query = new Query();
	$result['info'] = $query->decode($_POST);
	echo json_encode($result);
}


if(isset($_POST['modify'])) {
	// $result = array('modifyresult' => $_POST);
// 


	$query = new Query();
	$result['modify'] = $query->select("costs", substr($_POST['modify'], 9));
	echo json_encode($result) ;
}
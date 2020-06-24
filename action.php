<?php 
require 'functions.php';

if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case 'deleteList':
		case 'deleteTask':
			$form_data = $_POST['id'];
			break;

		case 'insertList':
			$form_data = $_POST['name'];
			break;
		
		default:
			$form_data = $_POST;
			break;
	}

	$function = $_GET['action'];
	if (function_exists($function)) {
		$function($form_data);
	}
}

?>
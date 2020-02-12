<?php 
require '../functions.php';
$function = $_GET['action'];
$form_data = $_POST['name'];

if (function_exists($function)) {
	$function($form_data);
}
?>
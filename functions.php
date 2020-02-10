<?php 
function openDatabaseConnection() {
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$database = "php-todo";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "gelukt!";
	return $conn;
}

function getAllItems() {
	$conn = openDatabaseConnection();

	$query = "SELECT * FROM `todo-items`";

	$result = $conn->query($query);

	$conn = null;

	return $result;
}
?>
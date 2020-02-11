<?php 
function openDatabaseConnection() {
	$servername = "localhost";
	$username = "root";
	$password = "mysql";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=php-todo", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

function getAllItems() {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `todo-items`");

	if ($query->execute()) {
		$result = $query->fetchAll();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function getItemsFromID($id) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `todo-items` WHERE `id` = :id");

	if ($query->execute([':id' => $id])) {
		$result = $query->fetch();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function getItemsFromUser($user) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `todo-items` WHERE `user` = :user");

	if ($query->execute([':user' => $user])) {
		$result = $query->fetchAll();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function insert_task($data) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("INSERT INTO `todo-items` (title, description, user, status) VALUES ('".implode("','", $data)."')");
	
	if ($query->execute()) {
		$message = "Succesvol toegevoegd!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function update_task($data) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare('UPDATE `todo-items` SET title = :title, description = :description, user = :user, status = :status WHERE id=:id');

	if ($query->execute([':title' => $data['title'], ':description' => $data['description'], ':user' => $data['user'], ':status' => $data['status'], ':id' => $data['id']])) {
		$message = "Succesvol aangepast!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function delete_task($id) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("DELETE FROM `todo-items` WHERE id = :id");

	if ($query->execute([':id' => $id])) {
		$message = "Succesvol verwijderd!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}
?>
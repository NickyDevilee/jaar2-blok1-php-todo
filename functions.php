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

function getAllLists() {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `lists`");

	if ($query->execute()) {
		$result = $query->fetchAll();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function getItemsFromListID($listID) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `todo-items` WHERE `list` = :listID");

	if ($query->execute([':listID' => $listID])) {
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

function getItemsFromStatus($status) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `todo-items` WHERE `status` = :status");

	if ($query->execute([':status' => $status])) {
		$result = $query->fetchAll();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function getItemsFromUser($user, $listID) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `todo-items` WHERE `user` = :user AND `list` = :listID");

	if ($query->execute([':user' => $user, ':listID' => $listID])) {
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
	$query = $conn->prepare("INSERT INTO `todo-items` (title, description, user, duur, list) VALUES ('".implode("','", $data)."')");
	
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
	$query = $conn->prepare('UPDATE `todo-items` SET title = :title, description = :description, user = :user, duur = :duration, list = :list WHERE id=:id');

	if ($query->execute([':title' => $data['title'], ':description' => $data['description'], ':user' => $data['user'], ':duration' => $data['duration'], ':list' => $data['list'], ':id' => $data['id']])) {
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






















function insert_list($data) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("INSERT INTO `lists` (name) VALUES ('".$data."')");
	
	if ($query->execute()) {
		$message = "Succesvol toegevoegd!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function getListsFromID($id) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare("SELECT * FROM `lists` WHERE `id` = :id");

	if ($query->execute([':id' => $id])) {
		$result = $query->fetch();
		$conn = null;
		return $result;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function update_list($data) {
	$conn = openDatabaseConnection();
	$query = $conn->prepare('UPDATE `lists` SET name = :name WHERE id=:id');

	if ($query->execute([':name' => $data['name'], ':id' => $data['id']])) {
		$message = "Succesvol aangepast!";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
		$conn = null;
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}

function delete_list($id) {
	$conn = openDatabaseConnection();

	$query1 = $conn->prepare("DELETE FROM `lists` WHERE id = :id");
	$query1_status = $query1->execute([':id' => $id]);

	if ($query1_status == true) {
		$query2 = $conn->prepare("SELECT * FROM `todo-items` WHERE `list` = :listID");
		
		if ($query2->execute([':listID' => $id])) {
			$result = $query2->fetchAll();

			if (!empty($result)) {
				$query3 = $conn->prepare("DELETE FROM `todo-items` WHERE list = :list_id");
				$query3_status = $query3->execute([':list_id' => $id]);

				if ($query1_status == true && $query3_status == true) {
					$message = "Lijst & alle items succesvol verwijderd!";
					echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
					$conn = null;
				} else {
					$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
					echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
				}
			} else {
				if ($query1_status == true) {
					$message = "Lijst succesvol verwijderd!";
					echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
					$conn = null;
				} else {
					$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
					echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
				}
			}
		}
	} else {
		$message = "Oeps! Er is iets fout gegaan, probeer het opnieuw.";
		echo "<script type='text/javascript'>alert('$message'); window.location='index.php';</script>";
	}
}
?>
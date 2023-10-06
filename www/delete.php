<?php
if ( isset($_GET["id"])) {
	$id = $_GET["id"];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "CRUD";

	// Create connection
	$connection = new mysqli($servername, $username, $password, $dbname);

	$sql = "DELETE FROM clients WHERE id=$id";
	$connection->query($sql);
}

// Redirect to index.php
header("location: index.php");
exit;
?>
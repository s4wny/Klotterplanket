<?php

require_once '../dbConfig.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($mysqli->connect_errno)
	exit("Connect failed: %s\n". $mysqli->connect_error);

$stmt = $mysqli->prepare("SELECT user_ID, comment FROM post WHERE user_ID = ?");

if($stmt) {
	$stmt->bind_param('i', $_GET['id']);
	$stmt->execute();
	$stmt->bind_result($userID, $comment);
	
	while ($stmt->fetch()) {
		echo "UserID '$userID' skrev '$comment'";
		echo "<br>";
	}

	$stmt->close();
}
else {
	exit("Error:". $mysql->error);
}

$mysqli->close();

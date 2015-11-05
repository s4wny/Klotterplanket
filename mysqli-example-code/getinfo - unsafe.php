<?php

require_once '../dbConfig.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($mysqli->connect_errno)
	exit("Connect failed: %s\n". $mysqli->connect_error);

$result = $mysqli->query("SELECT user_ID, comment FROM post WHERE id = ". $_GET['id'], MYSQLI_USE_RESULT);

if ($result) {
	while(NULL !== ($row = $result->fetch_array())) {
		echo "UserID '". $row['user_ID'] ."' skrev '". $row['comment'] ."'";
		echo "<br>";
	}

	$result->close();
}
else {
	exit("Error: ". $mysqli->error);
}

$mysqli->close();

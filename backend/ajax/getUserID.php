<?php
header('Content-Type: application/json');		//Easier for browser to read... Mabey..

require_once '../../dbConfig.php';
include_once '../helpers.php';

$data = array();
if(isset($_GET["username"]))					//We want the ids of the posts that we have sent, so that we dont send them again.
	$name = $_GET["username"];					//We should mabey not send them as json. But for the time being 

try {
    $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
} catch(PDOException $e) {
    die("Kan inte ansluta till databasen". $e->getMessage());
}

$sth = $dbh->prepare('SELECT * FROM `users`');

if($sth->execute()) {
    $users = $sth->fetchAll();
} else {
    die("PDO error:". print_r($sth->errorInfo(), true));
}


foreach ($users as $user) {
	if(strcasecmp(substr($user['userName'], 0, strlen($name)), $name) == 0)
	{
		array_push($data, array("user_name" => $user['userName'], "ID" => $user['ID']));
	}
}

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	/* special ajax here */
	die(json_encode($data));
} else {
	array_push($data, array("ID" => ""));
	header("Location: ../../index.php?filter=" . $data[0]['ID']);
}


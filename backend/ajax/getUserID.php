<?php
//header('Content-Type: application/json');		//Easier for browser to read... Mabey..

require_once '../../dbConfig.php';
include_once '../helpers.php';

$data = array();
echo "some text ";
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
		echo "string";
	}
	echo "Some nice text " $user['userName'] . "Value";
	
	array_push($data, $user);
}

print_r($data);


?>

<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<p>Text</p>
	</body>
</html>
<?php

require_once 'dbConfig.php';
include_once 'backend/helpers.php';

if(!empty($_POST['userName'])) {
	//Create connection to the database
	try {
		$dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
	} catch(PDOException $e) {
		die("Kan inte ansluta till databasen". $e->getMessage());
	}

	//Query for users with the requested username
	$result = $dbh->query('SELECT COUNT(*) FROM `users` WHERE `userName` = "'. $_POST['userName'] .'"')->fetch();

	if($result[0] > 0) {
		$errors[] = "Användarnamnet är upptaget!";
	}
	else {
		$sth = $dbh->prepare('INSERT INTO `users` (`userName`, `password`) VALUES ("'. $_POST['userName'] .'", "'. $_POST['password'] .'")');
		
		if($sth->execute()) {
			session_start();
			$_SESSION['flash'] = array('success' => array('Du är nu registrerad och kan logga in!'));
			header('Location: index.php');
			exit;
		}
		else {
			$errors[] = "PDO error:". print_r($sth->errorInfo(), true);
		}
	}
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrera</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<h1>Registrera</h1>
			
		<?php include 'view/error-module.php'; ?>

		<form action="register.php" method="post" class="island">
    	        Användarnamn: <input type="text" name="userName">
    	        Lösenord: <input type="password" name="password">
    	        <input type="submit">
    	</form>
    </div>
</body>
</html>
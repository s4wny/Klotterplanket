<?php

require_once 'dbConfig.php';
require_once 'backend/helpers.php';

if(isset($_POST['userName'])) {
	//Create connection to the database
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=Klotter;charset=utf8', DB_USER, DB_PASSWORD);
	} catch(PDOException $e) {
		die("Kan inte ansluta till databasen". $e->getMessage());
	}

	$sth = $dbh->prepare('SELECT * FROM `users` WHERE userName = "'. $_POST['userName'] .'" AND password = "'. $_POST['password'] .'"');


	if($sth->execute()) {
		$result = $sth->fetch();

		//Correct username and password, proceed
		if(!empty($result)) {
			session_start();
			$_SESSION["user"] = array('name' => $_POST['userName'],
				                      'id'   => $result['ID']);

			header('Location: index.php');
			exit;
		}
		else {
			$errors[] = "Fel användarnamn / lösenord";
		}
	}
	else {
		$errors[] = "PDO error:". print_r($sth->errorInfo(), true);
	}
}

?>

<?php include 'view/error-module.php'; ?>

<form action="" method="post" class="island">
    Användarnamn: <input type="text" name="userName">
    Lösenord: <input type="password" name="password">
    <input type="submit">
</form>
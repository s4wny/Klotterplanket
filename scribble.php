<?php

require_once 'dbConfig.php';
include_once 'backend/helpers.php';

if(!isset($_SESSION['user'])) {
	exit("Inte inloggad.");
}


if(isset($_POST['scribble'])) {
	//Create connection to the database
	try {
		$dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
	} catch(PDOException $e) {
		die("Kan inte ansluta till databasen". $e->getMessage());
	}

	$sth = $dbh->prepare('INSERT INTO `post` (`user_ID`, `comment`, `time_posted`) VALUES ("'. $_SESSION['user']['id'] .'", "'. $_POST['scribble'] .'", "'. date('Y-m-d H:i:s') .'")');

	if($sth->execute()) {
		header('Location: index.php');
		exit;
	}
	else {
		$errors[] = "PDO error:". print_r($sth->errorInfo(), true);
	}

}

?>

<?php include 'view/error-module.php'; ?>

<form action="" method="post" class="island">
    Klottra: 
    <textarea name="scribble"></textarea>
    <input type="submit" value="Klottra!">
</form>
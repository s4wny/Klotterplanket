<?php

if(!isset($_GET['show_single_scribble'])) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die("500. Nu hände ngt knas på server sidan.");
}

require_once 'dbConfig.php';
include_once 'backend/helpers.php';

//Create connection to the database
try {
    $dbh = new PDO('mysql:host=localhost;dbname=Klotter;charset=utf8', DB_USER, DB_PASSWORD);
} catch(PDOException $e) {
    die("Kan inte ansluta till databasen". $e->getMessage());
}


$id  = $_GET['show_single_scribble'];
$sth = $dbh->prepare('SELECT * FROM `post` WHERE ID = "'. $id .'"');


if($sth->execute()) {
    $scribble = $sth->fetch();
}
else {
    die("PDO error:". print_r($sth->errorInfo(), true));
}

?>

<div class="scribble-wrapper">
    <h2>Enstaka klotter</h2>

    <ul>
        <li>
            <a href="">
                <p><?= $scribble['comment'] ?></p>
            </a>
        </li>
    </ul>
</div>
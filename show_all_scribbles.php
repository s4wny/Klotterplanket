<?php

require_once 'dbConfig.php';
include_once 'backend/helpers.php';

//Create connection to the database
try {
    $dbh = new PDO('mysql:host=localhost;dbname=Klotter;charset=utf8', DB_USER, DB_PASSWORD);
} catch(PDOException $e) {
    die("Kan inte ansluta till databasen". $e->getMessage());
}

$offset = 0;
if(isset($_GET['offset'])){
    $offset = $_GET['offset'];
}

$sth = $dbh->prepare('SELECT * FROM `post` ORDER BY id DESC LIMIT ' . 16*$offset . ', 16');

if($sth->execute()) {
    $scribbles = $sth->fetchAll();
}
else {
    die("PDO error:". print_r($sth->errorInfo(), true));
}

?>

<div class="scribble-wrapper">
    <h2>Da klotter</h2>

    <ul>
        <?php foreach($scribbles as $scribble) : ?>
            <li>
                <a href="?filter=<?= $scribble['user_ID'] ?>">
                    <p><?= $scribble['comment'] ?></p>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
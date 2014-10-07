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

$lenght = 1;
if(isset($_GET['lenght'])){
    $lenght = $_GET['lenght'];
}


$filter = -1;
if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
    if(strlen($filter) == 0)
        $filter = -1;
}

if($filter != -1){
    $sth = $dbh->prepare('SELECT * FROM `post` WHERE user_ID = "'. $filter .'" ORDER BY id DESC LIMIT ' . 16 * $offset . ', ' . 16 * $lenght);
}else{
    $sth = $dbh->prepare('SELECT * FROM `post` ORDER BY id DESC LIMIT ' . 16 * $offset . ', ' . 16 * $lenght);
}


if($sth->execute()) {
    $scribbles = $sth->fetchAll();
} else {
    die("PDO error:". print_r($sth->errorInfo(), true));
}

?>

<?php foreach($scribbles as $scribble) : ?>
    <li>
        <a href="?filter=<?= $scribble['user_ID'] ?>">
            <p><?= $scribble['comment'] ?></p>
        </a>
    </li>
<?php endforeach; ?>
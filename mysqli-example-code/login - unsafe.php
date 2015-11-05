<?php

require_once '../dbConfig.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($mysqli->connect_errno)
    exit("Connect failed: %s\n". $mysqli->connect_error);

$result = $mysqli->query('SELECT id FROM users WHERE userName = "'. $_GET['userName'] .'" AND password = "'. $_GET['password'] .'"');

if($result) {
    if($result->num_rows === 1) {
        // Rätt lösenord och användarnamn
        // ...sätt $_SESSION, skicka vidare till sin profil, osv...
        exit("Rätt lösenord och användarnamn");
    }
    else {
        exit("Fel lösenord/användarnamn");
    }

    $result->close();
}
else {
    exit("Error: ". $mysqli->error);
}

$mysqli->close();

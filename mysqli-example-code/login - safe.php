<?php

require_once '../dbConfig.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($mysqli->connect_errno)
    exit("Connect failed: %s\n". $mysqli->connect_error);

$stmt = $mysqli->prepare('SELECT id FROM users WHERE userName = ? AND password = ?');

if($stmt) {
    $stmt->bind_param('ss', $_GET['userName'], $_GET['password']);
    $stmt->execute();
    $stmt->store_result();
    
    if($stmt->num_rows() === 1) {
        // Rätt lösenord och användarnamn
        // ...sätt $_SESSION, skicka vidare till sin profil, osv...
        exit("Rätt lösenord och användarnamn");
    }
    else {
        exit("Fel lösenord/användarnamn");
    }

    $stmt->close();
}
else {
    exit("Error:". $mysql->error);
}

$mysqli->close();

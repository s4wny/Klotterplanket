<?php

session_start();

if(isset($_SESSION['flash']['success'])) {
    $success = $_SESSION['flash']['success'];
    unset($_SESSION['flash']['success']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klotterplanket</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <h1>
            <a href="index.php" class="nostyle">
                Klotterplanket
            </a>
        </h1>
        
        <nav>
            <ul>
                <?php if(isset($_SESSION['user'])) : ?>
                    <li><a href="logout.php">Logga ut</a></li>
                <?php else: ?>
                    <li><a href="register.php">Registrera</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <hr>
    
        <?php if(isset($success)): ?>
            <ul class="success">
                <?php foreach($success as $mess) : ?>
                    <li><?= $mess ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['user'])) : ?>
            <h4>Välkommen <?= $_SESSION['user']['name']; ?></h4>
        <?php else: ?>
            <?php include 'login.php' ?>
        <?php endif; ?>
    
        
        <?php if(isset($_SESSION['user'])) : ?>
            <?php include 'scribble.php'; ?>
        <?php endif; ?>

        <?php if(isset($_GET['show_single_scribble'])): ?>
            <?php include 'show_single_scribble.php'; ?>
        <?php else: ?>
            <?php include 'show_all_scribbles.php'; ?>
        <?php endif; ?>
    </div>
</body>
</html>

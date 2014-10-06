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

        <div class="scribble-wrapper">
            <h2>Da klotter</h2>
            <ul>
                <?php include 'scribbles.php'; ?>
            </ul>
        </div>
    </div>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">window.jQuery || document.write('<script src="js/jQuery.1.11.1.js"><\/script>')</script>
    <script type="text/javascript" src="js/autoload.js"></script>
    <script type="text/javascript" src="js/speedSearch.js"></script>

</body>
</html>

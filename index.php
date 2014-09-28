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
            Klotterplanket
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
            <h4>Välkommen <?= $_SESSION['user']; ?></h4>
        <?php else: ?>
            <?php include 'login.php' ?>
        <?php endif; ?>
    

        <form action="scribble.php" method="post" class="island">
            Klottra: 
            <textarea name="scribble"></textarea>
            <input type="submit" value="Klottra!">
        </form>

        
        <div class="scribble-wrapper">
            <h2>Da klotter</h2>

            <ul>
                <li>
                    <a href="#">
                        <h2>Title</h2>
                        <p>I am a fun text. 1001001</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h2>Title 2</h2>
                        <p>Here is some text</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h2>Title 2</h2>
                        <p>Here is some text</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h2>Title 2</h2>
                        <p>Here is some text</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h2>Title 2</h2>
                        <p>Here is some text</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h2>Title 2</h2>
                        <p>Here is some text this is some more text, lets se what happens now</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <h2>Title 2</h2>
                        <p>Here is some text</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>

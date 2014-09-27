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

            <div class="scribble">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, placeat, dolores nisi nostrum ut non molestiae sit atque dolore nam nulla magnam sint asperiores. Temporibus accusantium eos odio repellendus adipisci.
                </p>
            </div>

            <div class="scribble">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, placeat, dolores nisi nostrum ut non molestiae sit atque dolore nam nulla magnam sint asperiores. Temporibus accusantium eos odio repellendus adipisci.
                </p>
            </div>

            <div class="scribble">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, placeat, dolores nisi nostrum ut non molestiae sit atque dolore nam nulla magnam sint asperiores. Temporibus accusantium eos odio repellendus adipisci.
                </p>
            </div>

        </div>
    </div>
</body>
</html>

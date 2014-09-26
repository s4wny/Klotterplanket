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
                <li><a href="">Registrera</a></li>
            </ul>
        </nav>


        <form action="login.php" method="post" class="island">
            Användarnamn: <input type="text">
            Lösenord: <input type="password">
            <input type="submit">
        </form>
    

        <form action="scribble.php" method="post" class="island">
            Klottra: 
            <textarea name="scribble"></textarea>
            <input type="submit" value="Klottra!">
        </form>

        
        <div class="klotterplanket">
            <h2>Da klotter</h2>

            <div class="klotter">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, placeat, dolores nisi nostrum ut non molestiae sit atque dolore nam nulla magnam sint asperiores. Temporibus accusantium eos odio repellendus adipisci.
                </p>
            </div>

            <div class="klotter">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, placeat, dolores nisi nostrum ut non molestiae sit atque dolore nam nulla magnam sint asperiores. Temporibus accusantium eos odio repellendus adipisci.
                </p>
            </div>

            <div class="klotter">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, placeat, dolores nisi nostrum ut non molestiae sit atque dolore nam nulla magnam sint asperiores. Temporibus accusantium eos odio repellendus adipisci.
                </p>
            </div>

        </div>
    </div>
</body>
</html>

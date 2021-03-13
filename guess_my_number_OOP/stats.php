<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <p>
            <?php
                session_start();
                include "game.php";
                $game = unserialize($_SESSION['game']);
               if($game->getType() == "user"){
                    echo "<h4>Felicidades, has acertado</h4>";
                    echo "<p>Número de intentos " , $game->getCount() , "</p>";
               }else{
                   echo "<h4>Tu número era ", $game->getResultado() , "</h4>";
                   echo "<p>Número de intentos " , $game->getCount() , "</p>";
               }
            ?>
        </p>
        <form method="get">
            <button type="submit" name="submit">Jugar Otra Vez</button>
        </form>
        <?php
        if(isset($_GET["submit"])){
            header('Location: index.php');
        }
        ?>
    </body>
</html>
<html>
    <head>
        <title>Stats</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <p>
            <?php
                session_start();
                include "..\database\conexion.php";
                $db->connect();
                include "game.php";
                $game = unserialize($_SESSION['game']);
               if($game->getType() == "user"){
                    echo "<h4>Felicidades, has acertado</h4>";
                    echo "<p>Número de intentos " , $game->getCount() , "</p>";
                    $db->insert("usuario", $game->getDiff(), $game->getCount());
                    
               }else{
                   echo "<h4>Tu número era ", $game->getResultado() , "</h4>";
                   echo "<p>Número de intentos " , $game->getCount() , "</p>";
                   $db->insert("máquina", $game->getDiff(), $game->getCount());
               }
               session_destroy();
            ?>
        </p>
        <form action="index.php">
            <button type="submit">Jugar Otra Vez</button>
        </form>
    </body>
</html>
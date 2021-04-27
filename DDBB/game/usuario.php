<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <?php
            session_start();
            include "game.php";
            $game = unserialize($_SESSION['game']);
            if($game->getDiff() == "facil"){
                echo "<h1>Modo: Usuario acierta, Fácil </h1>";
            }else if($game->getDiff() == "normal"){
                echo "<h1>Modo: Usuario acierta, Normal </h1>";
            }else{
                echo "<h1>Modo: Usuario acierta, Difícil </h1>";
            }
        ?>
        <div id="play">
            <h3>Intenta acertar el número</h3>
            <form method="get">
                <button type="submit" name="submit">Elegir número</button>
                <?php
                    if($game->getDiff() == "facil"){
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"10\"/ required>";
                    }else if($game->getDiff() == "normal"){
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"50\"/ required>";
                    }else{
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"100\"/ required>";
                    }
                ?>
            </form>
        </div>
        <?php            
            if(isset($_GET["submit"])){
                if(isset($_GET["num"])){
                    if($game->isAcertado($_GET["num"])){
                        $_SESSION["game"] = serialize($game);
                        header('Location: stats.php');
                    }else{
                        $_SESSION["game"] = serialize($game);
                    }
                }
            }
        ?>
    </body>
</html>
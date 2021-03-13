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
                echo "<h1>Modo: Máquina acierta, Fácil </h1>";
            }else if($game->getDiff() == "normal"){
                echo "<h1>Modo: Máquina acierta, Normal </h1>";
            }else{
                echo "<h1>Modo: Máquina acierta, Difícil </h1>";
            }
        ?>
        <div id="play">
            <h3>Inserta tu número para que acierte</h3>
            <form method="get">
                <?php
                    if($game->getDiff() == "facil"){
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"10\"/ required>";
                    }else if($game->getDiff() == "normal"){
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"50\"/ required>";
                    }else{
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"100\"/ required>";
                    }
                ?>
                <button type="submit" name="submit">Elegir número</button>
            </form>
        </div>
        <?php
            if(isset($_GET["submit"])){
                if(isset($_GET["num"])){
                    $game->setNum($_GET["num"]);
                    $game->setResultadoFinal();
                    $_SESSION["game"] = serialize($game);
                    //header('Location: stats.php');
                }
            }
        ?>
    </body>
</html>
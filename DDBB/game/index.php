<html>
    <head>
        <title>Guess my Number</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <div id="select">
            <form action="?" method="get">
                <h1>Modo de juego</h1>
                <input type="radio" id="usuario" name="modo" value="usuario" required>
                <label for="usuario">Usuario acierta</label><br>
                <input type="radio" id="maquina" name="modo" value="maquina">
                <label for="maquina">Máquina acierta</label><br>

                <h1>Dificcultad</h1>
                <input type="radio" id="facil" name="dif" value="facil" required>
                <label for="facil">Fácil</label><br>
                <input type="radio" id="normal" name="dif" value="normal">
                <label for="normal">Normal</label><br>
                <input type="radio" id="dificil" name="dif" value="dificil">
                <label for="dificil">Difícil</label><br>
                <br>
                <input type="submit" name="submit">
            </form>
            <form action="global_stats.php">
                <input type="submit" value="Mostrar estadisticas globales" />
            </form>

            
        </div>
        <?php
            session_start();
            include "game.php";
            if(isset($_GET["submit"])){
                $dif = $_GET["dif"];
                if($_GET["modo"] == "usuario"){
                    $game = new GameUsuario($dif);
                    $_SESSION["game"] = serialize($game);
                    header('Location: usuario.php');
                }else if($_GET["modo"] == "maquina"){
                    $game = new GameMaquina($dif);
                    $_SESSION["game"] = serialize($game);
                    header('Location: maquina.php');
                }
            }
        ?>
    </body>
</html>
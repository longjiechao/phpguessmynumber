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
            
            $game->genRand();
            echo "Es tú número ", $game->getRand(), "? <br>";
        ?>
        <div id="play">
            <h3¿Era mi número acertada?</h3>
            <form method="post">
                <button type="submit" name="peque">És más pequeño</button>
                <button type="submit" name="corr">És el número correcto</button>
                <button type="submit" name="grand">És más grande</button>
                
            </form>
        </div>
        
        
        <?php
            echo "min: " , $game->getMin() , "<br>max: " , $game->getMax(), "<br>";
            if(isset($_POST["peque"])){
                $game->incrementarCount();
                $game->setMax($game->getRand()-1);

                echo "Min:". $game->getMin(). "<br> Max: ". $game->getMax();
                if($game->getMin() == $game->getMax() || $game->getMin() > $game->getMax()){
                    header("Location: stats.php");
                }else{
                    header("Location: maquina2.php");
                }

            }else if (isset($_POST["grand"])){
                $game->incrementarCount();
                $game->setMin($game->getRand()+1);

                echo "Min:". $game->getMin(). "<br> Max: ". $game->getMax();
                if($game->getMin() == $game->getMax() || $game->getMin() > $game->getMax()){
                    header("Location: stats.php");
                }else{
                    header("Location: maquina2.php");
                }
            }else if(isset($_POST["corr"])){
                $game->incrementarCount();
                $game->setResultadoFinal();
                header("Location: stats.php");
            }
        ?>
    </body>
</html>
<html>
    <head>
        <title>TODO supply a title</title>
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
        </div>
        <?php
        session_start();
            if(isset($_GET["submit"])){
                $_SESSION["dif"] = $_GET["dif"];
                if($_GET["modo"] == "usuario"){
                    if($_GET["dif"] == "facil"){
                        $min = 1;
                        $max = 10;
                    }else if($_GET["dif"] == "normal"){
                        $min = 1;
                        $max = 50;
                    }else{
                        $min = 1;
                        $max = 100;
                    }
                    $_SESSION["num"] = rand($min, $max);
                    $_SESSION["intento"] = 0; 
                    $_SESSION["modo"] = $_GET["modo"]; 
                    header('Location: usuario.php');
                }else if($_GET["modo"] == "maquina"){
                    $_SESSION["adivinar"] = 0;
                    $_SESSION["modo"] = $_GET["modo"]; 
                    header('Location: maquina.php');
                }
            }
        ?>
    </body>
</html>
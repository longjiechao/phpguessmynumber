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
               if($_SESSION["modo"] == "usuario"){
                    $intento = $_SESSION["intento"];
                    echo "<h4>Felicidades, has acertado</h4>";
                    echo "<p>Número de intentos " , $intento , "</p>";
               }else{
                   $intento = $_SESSION["adivinar"];
                   $num = $_SESSION["randNum"];
                   echo "<h4>Tu número era ", $num , "</h4>";
                   echo "<p>Número de intentos " , $intento , "</p>";
               }
                
            ?>
        </p>
        <form method="get">
            <button type="submit" name="submit">Jugar Otra Vez</button>
        </form>
        
        <?php
        if(isset($_GET["submit"])){
            session_destroy();
            header('Location: index.php');
        }
        ?>
    </body>
</html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <?php
            session_start();
            $dif = $_SESSION["dif"];
            if($dif == "facil"){
                echo "<h1>Modo: Usuario acierta, Fácil </h1>";
            }else if($dif == "normal"){
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
                    if($dif == "facil"){
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"10\"/ required>";
                        $numero = range(1,10);
                        //print_r($numero);
                        $min = 1;
                        $max = 10;
                    }else if($dif == "normal"){
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"50\"/ required>";
                        $numero = range(1,50);
                        //print_r($numero);
                        $min = 1;
                        $max = 50;
                    }else{
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"100\"/ required>";
                        $numero = range(1,100);
                        //print_r($numero);
                        $min = 1;
                        $max = 100;
                    }
                ?>
            </form>
        </div>
        <?php
            $num = $_SESSION["num"];
            echo $num, "<br>";
            
            if(isset($_GET["submit"])){
                if(isset($_GET["num"])){
                    $numUser = $_GET["num"];
                    $_SESSION["intento"]++;
                    if($num < $numUser){
                        echo "Ese no era el número, el numero es más pequeño";
                    }else if($num > $numUser){
                        echo "Ese no era el número, el numero es más grande";
                    }
                    else{
                        header('Location: stats.php');
                    }
                }
            }
        ?>
    </body>
</html>
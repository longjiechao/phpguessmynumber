<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <?php
            ob_start();
            session_start();
            $dif = $_SESSION["dif"];
            if($dif == "facil"){
                echo "<h1>Modo: Máquina acierta, Fácil </h1>";
            }else if($dif == "normal"){
                echo "<h1>Modo: Máquina acierta, Normal </h1>";
            }else{
                echo "<h1>Modo: Máquina acierta, Difícil </h1>";
            }
        ?>
        <div id="play">
            <h3>Inserta tu número para que acierte</h3>
            <form method="get">
                <?php
                    if($dif == "facil"){
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"10\"/ required>";
                        $min = 1;
                        $max = 10;
                    }else if($dif == "normal"){
                        
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"50\"/ required>";
                        $min = 1;
                        $max = 50;
                        
                        //eliminar vacios
                        /*$numero[13] = null;
                        array_filter($numero);
                        print_r($numero);*/
                    }else{
                        echo "<input name=\"num\" type=\"number\" min=\"1\" max=\"100\"/ required>";
                        $min = 1;
                        $max = 100;
                    }
                    echo $dif;
                ?>
                <button type="submit" name="submit">Elegir número</button>
            </form>
        </div>
        <?php
            if(isset($_GET["submit"])){
                $num = $_GET["num"];
                
                if(isset($_GET["num"])){
                    $array = range($min, $max);
                    $rand = rand($min-1, count($array)-1);
                    $randNum = $array[$rand];
                    $loop = true;
                    $count = 0;
                    echo print_r($array), " Original <br>";
                    while($loop){
                        $count++;
                        if($num > $randNum){
                            $array = array_slice($array,$rand+1, count($array));
                        }else if($num < $randNum){
                            $array = array_slice($array,0,$rand);
                        }else{
                            echo"Tu numero es " , $randNum, "<br>";
                            $_SESSION["count"] = $count;
                            $_SESSION["randNum"] = $randNum;
                            $loop = false;
                        }
                        echo "Random Pos: ", $rand, " <br>";
                        echo "Random Number: ", $randNum, " <br>";
                        echo print_r($array), " <br>";
                        $rand = rand($min-1, count($array)-1);
                        $randNum = $array[$rand];
                        
                    }
                    echo "intentos ", $count, "<br>";
                    echo "Num: ", $num, "<br>";
                    echo "Random: ", $rand, "<br>";
                }
                header('Location: stats.php');
                ob_end_flush();
                exit();
            }
        ?>
    </body>
</html>
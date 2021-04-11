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
            
            if($dif == "facil"){
                if(!(isset($_SESSION["min"]) && isset($_SESSION["max"]))){
                    $min = 1;
                    $max = 10;
                }else{
                    $min = $_SESSION["min"];
                    $max = $_SESSION["max"];
                }
            }else if($dif == "normal"){
                if(!(isset($_SESSION["min"]) && isset($_SESSION["max"]))){
                    $min = 1;
                    $max = 50;
                }else{
                    $min = $_SESSION["min"];
                    $max = $_SESSION["max"];
                }
            }else{
                if(!(isset($_SESSION["min"]) && isset($_SESSION["max"]))){
                    $min = 1;
                    $max = 100;
                }else{
                    $min = $_SESSION["min"];
                    $max = $_SESSION["max"];
                }
            }
            
            if(isset($_SESSION["random"])){
                echo "Es tú número ", $_SESSION["random"], "? <br>";
            }else{
                
                $_SESSION["random"] = ($max/2);
                echo "Es tú número ", $_SESSION["random"], "? <br>";
            }
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
        echo "ey <br>";
        echo "min: " , $min , "<br>max: " , $max, "<br>";
            if(isset($_POST["peque"])){
                $max = $_SESSION["random"];
                $max--;
                
                $random = rand($min, $max);
                
                $_SESSION["random"] = $random;
                
                $_SESSION["min"] = $min;
                $_SESSION["max"] = $max;
                
                header("Location: maquina2.php");
            }else if (isset($_POST["grand"])){
                $min = $_SESSION["random"];
                $min++;
                
                $random = rand($min, $max);
                
                $_SESSION["random"] = $random;
                
                $_SESSION["min"] = $min;
                $_SESSION["max"] = $max;
                
                header("Location: maquina2.php");
            }else if(isset($_POST["corr"])){
                session_destroy();
            }
            
//            if(isset($_GET["submit"])){
//                $num = $_GET["num"];
//                
//                if(isset($_GET["num"])){
//                    $array = range($min, $max);
//                    $rand = rand($min-1, count($array)-1);
//                    $randNum = $array[$rand];
//                    $loop = true;
//                    $count = 0;
//                    echo print_r($array), " Original <br>";
//                    while($loop){
//                        $count++;
//                        if($num > $randNum){
//                            $array = array_slice($array,$rand+1, count($array));
//                        }else if($num < $randNum){
//                            $array = array_slice($array,0,$rand);
//                        }else{
//                            echo"Tu numero es " , $randNum, "<br>";
//                            $_SESSION["count"] = $count;
//                            $_SESSION["randNum"] = $randNum;
//                            $loop = false;
//                        }
//                        echo "Random Pos: ", $rand, " <br>";
//                        echo "Random Number: ", $randNum, " <br>";
//                        echo print_r($array), " <br>";
//                        $rand = rand($min-1, count($array)-1);
//                        $randNum = $array[$rand];
//                        
//                    }
//                    echo "intentos ", $count, "<br>";
//                    echo "Num: ", $num, "<br>";
//                    echo "Random: ", $rand, "<br>";
//                }
//                header('Location: stats.php');
//                ob_end_flush();
//                exit();
//            }
        ?>
    </body>
</html>
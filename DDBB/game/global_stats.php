<html>
    <head>
        <title>Global Stats</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            session_start();
            include "..\database\conexion.php";
            $db->connect();
        ?>
        <form action="index.php">
            <input type="submit" value="Volver"/>
        </form>
        <br>
        <form method="get" action="">
            <select name="select">
                <option value="Todos">Todos</option>
                <option value="Humano">Humano</option>
                <option value="Maquina">Máquina</option>
            </select>
            <button name="chooseSelct">MOSTRAR</button>
        </form>
        <?php
            if(isset($_GET["chooseSelct"])){
                if($_GET["select"] == "Todos"){
                    $db->createStats($db->selectAll());
                }else if($_GET["select"] == "Humano"){
                    $db->createStats($db->selectByModalitat("usuario"));
                }else if($_GET["select"] == "Maquina"){
                    $db->createStats($db->selectByModalitat("máquina"));
                }
            }
        ?>
        <br>
        <form method="get" action="">
            <p>Añadir</p>
            Modalidad<select name="modalitatAdd">
                <option value="máquina">Máquina</option>
                <option value="usuario">Usuario</option>
            </select><br>
            Nivell<select name="nivellAdd">
                <option value="facil">Facil</option>
                <option value="normal">Normal</option>
                <option value="dificil">Dificil</option>
            </select><br>
            Intentos<input name="intentosAdd"/><br>
            <button name="add">Añadir</button>
        </form><br>
        <form method="get" action="">
            <p>Borrar</p>
            ID<input name="idDelete"/>
            <button name="delete">Borrar</button>
        </form><br>
        
        <form method="get" action="">
            <p>Actualizar</p>
            ID<input name="idUpdate"/><br>
            Modalidad<select name="modalitatUpdate">
                <option value="máquina">Máquina</option>
                <option value="usuario">Usuario</option>
            </select><br>
            Nivell<select name="nivellUpdate">
                <option value="facil">Facil</option>
                <option value="normal">Normal</option>
                <option value="dificil">Dificil</option>
            </select><br>
            Intentos<input name="intentosUpdate"/><br>
            <button name="update">Actualizar</button>
        </form><br>
        
        <?php
            if(isset($_GET["add"])){
                $db->insert($_GET["modalitatAdd"], $_GET["nivellAdd"], $_GET["intentosAdd"]);
            }
            if(isset($_GET["delete"])){
                $db->delete($_GET["idDelete"]);
            }
            if(isset($_GET["update"])){
                $db->update($_GET["idUpdate"], $_GET["modalitatUpdate"], $_GET["nivellUpdate"], $_GET["intentosUpdate"]);
            }
        ?>
    </body>
</html>
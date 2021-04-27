<html>
    <head>
        <title>Global Stats</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form action="index.php">
            <input type="submit" value="Volver" />
        </form>
        <br>
        <?php
            session_start();
            include "..\database\conexion.php";
            $db->connect();
            $db->createStats();
        ?>
    </body>
</html>
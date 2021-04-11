<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            include "databaseconnection.php";
            $db = new ddbb("localhost", "root", "", "m07uf3");
            $db->createTable("CREATE TABLE hola(id int primary key)");
            $db->dropTable("hola");
            $db->insertEstadistica('solo', 1, 2)
        ?>
    </body>
</html>

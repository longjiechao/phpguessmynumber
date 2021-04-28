<?php

include_once 'DatabaseConnection.php';

/*
 * Implementació de la clase DatabaseConnection segons el model PDO, 
 * PHP Data Object.
 * @author Pep
 */

class DatabasePDO extends DatabaseConnection {

    const TABLE_START = "<table align='center'; style='border: solid 1px black;'><tr style='background: grey;'><th>Id</th><th>Modalitat</th><th>Nivell</th><th>Data</th><th>Intents</th></tr>";
    const TABLE_END = "</table>";

    private $database;

    public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }
    public function __destruct() {
        $this->connection = null; 
    }

    function connect(): void {
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    function insert($modalitat, $nivell, $intents): int {
        try {
            // prepare sql and bind parameters
            $stmt = $this->connection->prepare("INSERT INTO estadistiques (modalitat, nivell, intents) VALUES (:modalitat, :nivell, :intents)");
            $stmt->bindParam(':modalitat', $modalitat);
            $stmt->bindParam(':nivell', $nivell);
            $stmt->bindParam(':intents', $intents);
            $stmt->execute();
            return $this->connection->lastInsertId();
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    function selectAll() {
        $stmt = $this->connection->prepare("SELECT * FROM estadistiques");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }
    
    function createStats($select) {
        $stmt = $select;
        //$this->connection->query("SELECT * FROM estadistiques");
        echo "<table>";
        echo "<th>id</th><th>modalitat</th><th>nivell</th><th>data_partida</th><th>intents</th>";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>"."<td>".$row["modalitat"]."</td>"."<td>".$row["nivell"]."</td>"."<td>".$row["data_partida"]."</td>"."<td>".$row["intents"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function selectByModalitat($modalitat) {
        $stmt = $this->connection->prepare("SELECT * FROM estadistiques WHERE modalitat = '$modalitat'");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

    public function delete($id) {
        try{
            $sql = "DELETE FROM estadistiques WHERE id = $id";
            $this->connection->exec($sql);
        } catch (Exception $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        
    }

    public function findById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM estadistiques WHERE id = $id");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

    public function update($id, $modalitat, $nivell, $intents) {
        try{
            $sql = "UPDATE estadistiques SET modalitat='$modalitat', nivell='$nivell', intents='$intents' WHERE id=$id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
                echo $stmt->rowCount() . " records UPDATED successfully";
          } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
          }
      }

}

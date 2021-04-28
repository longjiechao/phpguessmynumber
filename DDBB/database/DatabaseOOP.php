<?php

include_once 'DatabaseConnection.php';

/**
 * Implementació de la clase DatabaseConnection segons el model OOP,
 * Object Oriented Programming.
 *
 * @author Pep
 */
class DatabaseOOP extends DatabaseConnection {

    private $database;
    public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }

    //put your code here
    public function connect(): void {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estdistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        if ($this->connection != null) {
            if ($this->connection->query($sql) === TRUE) {
                return $this->connection->insert_id;
            } else {
                return -1;
            }
        }
    }

    public function selectAll() {
        $sql = "SELECT * FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }
    
    function createStats($select) {
        $stmt = $select;
        //$this->connection->query("SELECT * FROM estadistiques");
        echo "<table>";
        echo "<th>id</th><th>modalitat</th><th>nivell</th><th>data_partida</th><th>intents</th>";
        while($row = $stmt->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>"."<td>".$row["modalitat"]."</td>"."<td>".$row["nivell"]."</td>"."<td>".$row["data_partida"]."</td>"."<td>".$row["intents"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function selectByModalitat($modalitat) {
        $sql = "SELECT * FROM estadistiques WHERE modalitat = '$modalitat'";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function delete($id) {
        $sql = "DELETE FROM estadistiques WHERE id = $id";
        
        if ($this->connection->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->connection->error;
        }
    }

    public function findById($id) {
        $sql = "SELECT * FROM estadistiques WHERE id = $id";
        $result = null;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        return $result;
    }

    public function update($id, $modalitat, $nivell, $intents) {
        $sql = "UPDATE estadistiques SET modalitat='$modalitat', nivell='$nivell', intents='$intents' WHERE id=$id";
        if ($this->connection->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $this->connection->error;
        }
    }

}

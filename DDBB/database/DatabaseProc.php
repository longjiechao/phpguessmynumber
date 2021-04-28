<?php

include_once 'DatabaseConnection.php';

/**
 * Implementació de la clase DatabaseConnection segons el model Procedimental.
 *
 * @author Pep
 */
class DatabaseProc extends DatabaseConnection {

    private $database;
    public function __construct($servername, $username, $password,$database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }

    public function connect(): void {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
            $this->connection = null;
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', '$nivell', $intents)";
        if (mysqli_query($this->connection, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }

    public function selectAll() {
        $sql = "SELECT * FROM estadistiques";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result;        
    }
    
    function createStats($select) {
        $stmt = $select;
        //$this->connection->query("SELECT * FROM estadistiques");
        echo "<table>";
        echo "<th>id</th><th>modalitat</th><th>nivell</th><th>data_partida</th><th>intents</th>";
        while($row = mysqli_fetch_assoc($stmt)) {
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
            $result = mysqli_query($this->connection, $sql);
        }
        return $result; 
    }

    public function delete($id) {
        $sql = "DELETE FROM estadistiques WHERE id = $id";

        if (mysqli_query($this->connection, $sql)) {
          echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . mysqli_error($this->connection);
        }
    }

    public function findById($id) {
        $sql = "SELECT * FROM estadistiques WHERE id = $id";
        $result = null;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
        return $result; 
    }

    public function update($id, $modalitat, $nivell, $intents) {
        $sql = "UPDATE estadistiques SET modalitat='$modalitat', nivell='$nivell', intents='$intents' WHERE id=$id";

        if (mysqli_query($this->connection, $sql)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . mysqli_error($this->connection);
        }
    }

}

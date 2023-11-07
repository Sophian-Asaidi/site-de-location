<?php

require_once '../include/bdd.inc.php';

class Commune {

    private $COL1; 
    private $con;

    public function __construct($COL1, $con) {
        $this->COL1 = $COL1;
        $this->con = $con;
    }

    public function getCOL1() {
        return $this->COL1;
    }

    public function getAllCommunes() {
        try {
            $sql = "SELECT * FROM commune";
            $stmt = $this->con->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
        }
    }

    public function insertCommune($COL1) {
        $data = [':COL1' => $COL1];
        $sql = "INSERT INTO commune (COL1) VALUES (:COL1)";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

    public function updateCommune($COL1, $newCOL1) {
        $data = [
            ':COL1' => $COL1,
            ':newCOL1' => $newCOL1,
        ];
        $sql = "UPDATE commune SET COL1 = :newCOL1 WHERE COL1 = :COL1";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

    public function deleteCommune($COL1) {
        $data = [':COL1' => $COL1];
        $sql = "DELETE FROM commune WHERE COL1 = :COL1";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute($data);
    }

}

?>

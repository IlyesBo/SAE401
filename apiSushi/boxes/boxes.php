<?php

class Box {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getBox($id) {
        $sqlQuery = "SELECT * FROM `box` WHERE `id_box` = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return "Erreur base de données";
        }
    }

    public function getAllBoxes() {
        $sqlQuery = "SELECT * FROM `box`";
        $stmt = $this->conn->prepare($sqlQuery);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "Erreur base de données";
        }
    }

    public function getAliments($id) {
        $sqlQuery = "SELECT aliment.nom, boxaliment.quantite FROM `boxaliment` INNER JOIN `aliment` ON boxaliment.aliment_id = aliment.id_aliment WHERE boxaliment.box_id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "Erreur base de données";
        }
    }

    public function getSaveur($id) {
        $sqlQuery = "SELECT saveur.nom FROM `boxsaveur` INNER JOIN `saveur` ON boxsaveur.saveur_id = saveur.id_saveur WHERE boxsaveur.box_id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $allSaveurs = [];
            foreach ($results as $result) {
                $allSaveurs[] = $result["nom"];
            }
            return $allSaveurs;
        } else {
            return "Erreur base de données";
        }
    }
}

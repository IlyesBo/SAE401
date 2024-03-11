<?php

class AlimentModel {
    private $db;

    public function __construct() {
        require_once('database.php');
        $this->db = new Database();
    }

    // Méthode pour récupérer tous les aliments depuis la base de données
    public function getAllAliments() {
        $query = "SELECT * FROM aliment";
        $result = $this->db->query($query);
        return $result;
    }

    // Méthode pour récupérer un aliment par son ID depuis la base de données
    public function getAlimentById($id) {
        $query = "SELECT * FROM aliment WHERE id_aliment = :id";
        $params = array(':id' => $id);
        $result = $this->db->query($query, $params);
        return $result;
    }

    // Méthode pour créer un nouvel aliment dans la base de données
    public function createAliment($nom) {
        $query = "INSERT INTO aliment (nom) VALUES (:nom)";
        $params = array(':nom' => $nom);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    // Méthode pour mettre à jour un aliment dans la base de données
    public function updateAliment($id, $nom) {
        $query = "UPDATE aliment SET nom = :nom WHERE id_aliment = :id";
        $params = array(':id' => $id, ':nom' => $nom);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    // Méthode pour supprimer un aliment de la base de données
    public function deleteAliment($id) {
        $query = "DELETE FROM aliment WHERE id_aliment = :id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);
        return $result;
    }
}

?>

<?php

class SaveurModel {
    private $db;

    public function __construct() {
        require_once('C:\xampp\htdocs\SAE401\apiSushi\config\database.php');
        $this->db = new Database();
    }

    // Méthode pour récupérer toutes les saveurs depuis la base de données
    public function getAllSaveurs() {
        $query = "SELECT * FROM saveur";
        $result = $this->db->query($query);
        return $result;
    }

    // Méthode pour récupérer une saveur par son ID depuis la base de données
    public function getSaveurById($id) {
        $query = "SELECT * FROM saveur WHERE id_saveur = :id";
        $params = array(':id' => $id);
        $result = $this->db->query($query, $params);
        return $result;
    }

    // Méthode pour créer une nouvelle saveur dans la base de données
    public function createSaveur($nom) {
        $query = "INSERT INTO saveur (nom) VALUES (:nom)";
        $params = array(':nom' => $nom);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    // Méthode pour mettre à jour une saveur dans la base de données
    public function updateSaveur($id, $nom) {
        $query = "UPDATE saveur SET nom = :nom WHERE id_saveur = :id";
        $params = array(':id' => $id, ':nom' => $nom);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    // Méthode pour supprimer une saveur de la base de données
    public function deleteSaveur($id) {
        $query = "DELETE FROM saveur WHERE id_saveur = :id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);
        return $result;
    }
}

?>

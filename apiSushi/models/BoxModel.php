<?php

class BoxModel {
    private $db;

    public function __construct() {
        require_once('C:\xampp\htdocs\SAE401\apiSushi\config\database.php');
        $this->db = new Database();
    }

    // Méthode pour récupérer toutes les boxes depuis la base de données
    public function getAllBoxes() {
        $query = "SELECT * FROM box";
        $result = $this->db->query($query);
        return $result;
    }

    // Méthode pour récupérer une box par son ID depuis la base de données
    public function getBoxById($id) {
        $query = "SELECT * FROM box WHERE id_box = :id";
        $params = array(':id' => $id);
        $result = $this->db->query($query, $params);
        return $result;
    }

    // Méthode pour créer une nouvelle box dans la base de données
    public function createBox($nom, $pieces, $prix, $image) {
        $query = "INSERT INTO box (nom, pieces, prix, image) VALUES (:nom, :pieces, :prix, :image)";
        $params = array(':nom' => $nom, ':pieces' => $pieces, ':prix' => $prix, ':image' => $image);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    // Méthode pour mettre à jour une box dans la base de données
    public function updateBox($id, $nom, $pieces, $prix, $image) {
        $query = "UPDATE box SET nom = :nom, pieces = :pieces, prix = :prix, image = :image WHERE id_box = :id";
        $params = array(':id' => $id, ':nom' => $nom, ':pieces' => $pieces, ':prix' => $prix, ':image' => $image);
        $result = $this->db->execute($query, $params);
        return $result;
    }

    // Méthode pour supprimer une box de la base de données
    public function deleteBox($id) {
        $query = "DELETE FROM box WHERE id_box = :id";
        $params = array(':id' => $id);
        $result = $this->db->execute($query, $params);
        return $result;
    }
}

?>

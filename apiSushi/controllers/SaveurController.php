<?php

require_once ('C:\xampp\htdocs\SAE401\apiSushi\config\database.php');
require_once('C:\xampp\htdocs\SAE401\apiSushi\models\SaveurModel.php');

class SaveurController {
    private $saveurModel;

    public function __construct() {
        $this->saveurModel = new SaveurModel();
    }

    // Méthode pour récupérer toutes les saveurs
    public function getAllSaveurs() {
        $saveurs = $this->saveurModel->getAllSaveurs();
        return $saveurs;
    }

    // Méthode pour récupérer une saveur par son ID
    public function getSaveurById($id) {
        $saveur = $this->saveurModel->getSaveurById($id);
        return $saveur;
    }

    // Méthode pour créer une nouvelle saveur
    public function createSaveur($nom) {
        $result = $this->saveurModel->createSaveur($nom);
        return $result;
    }

    // Méthode pour mettre à jour une saveur
    public function updateSaveur($id, $nom) {
        $result = $this->saveurModel->updateSaveur($id, $nom);
        return $result;
    }

    // Méthode pour supprimer une saveur
    public function deleteSaveur($id) {
        $result = $this->saveurModel->deleteSaveur($id);
        return $result;
    }
}

?>

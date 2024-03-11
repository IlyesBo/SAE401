<?php

require_once ('C:\xampp\htdocs\SAE401\apiSushi\config\database.php');
require_once('C:\xampp\htdocs\SAE401\apiSushi\models\BoxModel.php');

class BoxController {
    private $boxModel;

    public function __construct() {
        $this->boxModel = new BoxModel();
    }

    // Méthode pour récupérer toutes les boxes
    public function getAllBoxes() {
        $boxes = $this->boxModel->getAllBoxes();
        return $boxes;
    }

    // Méthode pour récupérer une box par son ID
    public function getBoxById($id) {
        $box = $this->boxModel->getBoxById($id);
        return $box;
    }

    // Méthode pour créer une nouvelle box
    public function createBox($nom, $pieces, $prix, $image) {
        $result = $this->boxModel->createBox($nom, $pieces, $prix, $image);
        return $result;
    }

    // Méthode pour mettre à jour une box
    public function updateBox($id, $nom, $pieces, $prix, $image) {
        $result = $this->boxModel->updateBox($id, $nom, $pieces, $prix, $image);
        return $result;
    }

    // Méthode pour supprimer une box
    public function deleteBox($id) {
        $result = $this->boxModel->deleteBox($id);
        return $result;
    }
}

?>

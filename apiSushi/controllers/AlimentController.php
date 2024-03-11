<?php

include_once 'C:\xampp\htdocs\SAE401\apiSushi\config\database.php';
include_once 'C:\xampp\htdocs\SAE401\apiSushi\models\AlimentModel.php';

class AlimentController {
    private $alimentModel;

    public function __construct() {
        $this->alimentModel = new AlimentModel();
    }

    // Endpoint pour récupérer tous les aliments
    public function getAllAliments() {
        $aliments = $this->alimentModel->getAllAliments();
        echo json_encode($aliments);
    }

    // Endpoint pour récupérer un aliment par son ID
    public function getAlimentById($id) {
        $aliment = $this->alimentModel->getAlimentById($id);
        echo json_encode($aliment);
    }

    // Endpoint pour créer un nouvel aliment
    public function createAliment($nom) {
        $aliment = $this->alimentModel->createAliment($nom);
        echo json_encode($aliment);
    }

    // Endpoint pour mettre à jour un aliment
    public function updateAliment($id, $nom) {
        $aliment = $this->alimentModel->updateAliment($id, $nom);
        echo json_encode($aliment);
    }

    // Endpoint pour supprimer un aliment
    public function deleteAliment($id) {
        $result = $this->alimentModel->deleteAliment($id);
        echo json_encode($result);
    }
}

?>

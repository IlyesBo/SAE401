<?php

require_once 'database.php';

$database = new Database(); 

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Requête pour récupérer la liste des saveurs
        $sql = "SELECT * FROM saveur";
        $result = $database->query($sql);

        $saveurs = array();

        if ($result) {
            foreach ($result as $row) {
                $saveurs[] = $row;
            }
        }
        // Afficher le résultat au format JSON
        header('Content-Type: application/json');
        echo json_encode($saveurs);
        break;
    
    case 'POST':
        // Logique pour ajouter une saveur
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['nom'])) {
            $nom = $data['nom'];

            // Insérer la saveur dans la table saveur
            $sql = "INSERT INTO saveur (nom) VALUES (?)";
            $stmt = $database->prepare($sql);
            if ($stmt->execute([$nom])) {
                http_response_code(201); // Créé avec succès
                echo "La saveur a été ajoutée avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
                echo "Une erreur s'est produite lors de l'ajout de la saveur.";
            }
        } else {
            http_response_code(400); // Mauvaise requête
            echo "Le nom de la saveur n'est pas fourni.";
        }
        break;

    case 'PUT':
        // Mettre à jour une saveur
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id_saveur']) && isset($data['nom'])) {
            $idSaveur = $data['id_saveur'];
            $nom = $data['nom'];

            // Mettre à jour la saveur dans la table saveur
            $sql = "UPDATE saveur SET nom=? WHERE id_saveur=?";
            $stmt = $database->prepare($sql);
            if ($stmt->execute([$nom, $idSaveur])) {
                http_response_code(200); // Succès
                echo "La saveur a été mise à jour avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
                echo "Une erreur s'est produite lors de la mise à jour de la saveur.";
            }
        } else {
            http_response_code(400); // Mauvaise requête
            echo "Les données nécessaires ne sont pas fournies.";
        }
        break;

    case 'DELETE':
        // Logique pour supprimer une saveur
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id_saveur'])) {
            $idSaveur = $data['id_saveur'];

            // Supprimer la saveur de la table saveur
            $sql = "DELETE FROM saveur WHERE id_saveur=?";
            $stmt = $database->prepare($sql);
            if ($stmt->execute([$idSaveur])) {
                http_response_code(200); // Succès
                echo "La saveur a été supprimée avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
                echo "Une erreur s'est produite lors de la suppression de la saveur.";
            }
        } else {
            http_response_code(400); // Mauvaise requête
            echo "L'identifiant de la saveur n'est pas fourni.";
        }
        break;

    default:
        http_response_code(405); // Méthode non autorisée
        break;
}

// Fermer la connexion à la base de données en utilisant PDO
$database = null;

<?php

require_once 'database.php';

$database = new Database(); 

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Requête pour récupérer la liste des aliments
        $sql = "SELECT * FROM aliment";
        $result = $database->query($sql);

        $aliments = array();

        if ($result) {
            foreach ($result as $row) {
                $aliments[] = $row;
            }
        }
        // Afficher le résultat au format JSON
        header('Content-Type: application/json');
        echo json_encode($aliments);
        break;
    
    case 'POST':
        // Logique pour ajouter un aliment
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['nom'])) {
            $nom = $data['nom'];

            // Insérer l'aliment dans la table aliment
            $sql = "INSERT INTO aliment (nom) VALUES (?)";
            $stmt = $database->prepare($sql);
            if ($stmt->execute([$nom])) {
                http_response_code(201); // Créé avec succès
                echo "L'aliment a été ajouté avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
                echo "Une erreur s'est produite lors de l'ajout de l'aliment.";
            }
        } else {
            http_response_code(400); // Mauvaise requête
            echo "Le nom de l'aliment n'est pas fourni.";
        }
        break;

    case 'PUT':
        // Mettre à jour un aliment
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id_aliment']) && isset($data['nom'])) {
            $idAliment = $data['id_aliment'];
            $nom = $data['nom'];

            // Mettre à jour l'aliment dans la table aliment
            $sql = "UPDATE aliment SET nom=? WHERE id_aliment=?";
            $stmt = $database->prepare($sql);
            if ($stmt->execute([$nom, $idAliment])) {
                http_response_code(200); // Succès
                echo "L'aliment a été mis à jour avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
                echo "Une erreur s'est produite lors de la mise à jour de l'aliment.";
            }
        } else {
            http_response_code(400); // Mauvaise requête
            echo "Les données nécessaires ne sont pas fournies.";
        }
        break;

    case 'DELETE':
        // Logique pour supprimer un aliment
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id_aliment'])) {
            $idAliment = $data['id_aliment'];

            // Supprimer l'aliment de la table aliment
            $sql = "DELETE FROM aliment WHERE id_aliment=?";
            $stmt = $database->prepare($sql);
            if ($stmt->execute([$idAliment])) {
                http_response_code(200); // Succès
                echo "L'aliment a été supprimé avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
                echo "Une erreur s'est produite lors de la suppression de l'aliment.";
            }
        } else {
            http_response_code(400); // Mauvaise requête
            echo "L'identifiant de l'aliment n'est pas fourni.";
        }
        break;

    default:
        http_response_code(405); // Méthode non autorisée
        break;
}

// Fermer la connexion à la base de données en utilisant PDO
$database = null;

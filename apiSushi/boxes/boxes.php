<?php

require_once 'database.php';

$database = new Database(); 

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Requête pour récupérer la liste des sushi boxes avec leurs saveurs et aliments associés
        $sql = "SELECT b.*, GROUP_CONCAT(s.nom SEPARATOR ', ') as saveurs, GROUP_CONCAT(a.nom SEPARATOR ', ') as aliments 
                FROM box b 
                LEFT JOIN boxsaveur bs ON b.id_box = bs.box_id 
                LEFT JOIN saveur s ON bs.saveur_id = s.id_saveur 
                LEFT JOIN boxaliment ba ON b.id_box = ba.box_id 
                LEFT JOIN aliment a ON ba.aliment_id = a.id_aliment 
                GROUP BY b.id_box";
        $result = $database->query($sql);

        $sushiBoxes = array();

        if ($result) {
            foreach ($result as $row) {
                $sushiBoxes[] = $row;
            }
        }
        // Afficher le résultat au format JSON
        header('Content-Type: application/json');
        echo json_encode($sushiBoxes);
        break;
    
    case 'POST':
        // Logique pour ajouter un sushi box
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id_box']) && isset($data['nom']) && isset($data['pieces']) && isset($data['prix']) && isset($data['image']) && isset($data['saveurs']) && isset($data['aliments'])) {
            $idbox = $data['id_box'];
            $nom = $data['nom'];
            $pieces = $data['pieces'];
            $prix = $data['prix'];
            $image = $data['image'];
            $saveurs = $data['saveurs'];
            $aliments = $data['aliments'];

            // Insérer le sushi box dans la table box
            $sql = "INSERT INTO box (id_box, nom, pieces, prix, image) VALUES ('$idbox' ,'$nom', '$pieces', '$prix', '$image')";

            if ($database->execute($sql)) {
                $boxId = $database->lastInsertId();

                // Insérer les saveurs du sushi box dans la table boxsaveur
                foreach ($saveurs as $saveurId) {
                    $saveurSql = "INSERT INTO boxsaveur (box_id, saveur_id) VALUES ('$boxId', '$saveurId')";
                    $database->execute($saveurSql);
                }

                // Insérer les aliments du sushi box dans la table boxaliment
                foreach ($aliments as $alimentId) {
                    $alimentSql = "INSERT INTO boxaliment (box_id, aliment_id, quantite) VALUES ('$boxId', '$alimentId', 1)";
                    $database->execute($alimentSql);
                }

                http_response_code(201); // Créé avec succès
                echo "Le sushi box a été ajouté avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
            }
        } else {
            http_response_code(400); 
        }
        break;
    
    case 'PUT':
        // Mettre à jour un sushi box
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id_box']) && isset($data['nom']) && isset($data['pieces']) && isset($data['prix']) && isset($data['image']) && isset($data['saveurs']) && isset($data['aliments'])) {
            $idBox = $data['id_box'];
            $nom = $data['nom'];
            $pieces = $data['pieces'];
            $prix = $data['prix'];
            $image = $data['image'];
            $saveurs = $data['saveurs'];
            $aliments = $data['aliments'];

            // Mettre à jour le sushi box dans la table box
            $sql = "UPDATE box SET nom='$nom', pieces='$pieces', prix='$prix', image='$image' WHERE id_box='$idBox'";

            if ($database->execute($sql)) {
                // Supprimer les anciennes saveurs et aliments associés au sushi box
                $deleteBoxSaveurSql = "DELETE FROM boxsaveur WHERE box_id = '$idBox'";
                $database->execute($deleteBoxSaveurSql);

                $deleteBoxAlimentSql = "DELETE FROM boxaliment WHERE box_id = '$idBox'";
                $database->execute($deleteBoxAlimentSql);

                // Insérer les nouvelles saveurs et aliments du sushi box
                foreach ($saveurs as $saveurId) {
                    $saveurSql = "INSERT INTO boxsaveur (box_id, saveur_id) VALUES ('$idBox', '$saveurId')";
                    $database->execute($saveurSql);
                }

                foreach ($aliments as $alimentId) {
                    $alimentSql = "INSERT INTO boxaliment (box_id, aliment_id, quantite) VALUES ('$idBox', '$alimentId', 1)";
                    $database->execute($alimentSql);
                }

                http_response_code(200); // Succès
                echo "Le sushi box a été mis à jour avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
            }
        } else {
            http_response_code(400); 
        }
        break;
    
    case 'DELETE':
        // Logique pour supprimer un sushi box
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id_box'])) {
            $idBox = $data['id_box'];

            // Supprimer les aliments associés au sushi box de la table boxaliment
            $deleteBoxAlimentSql = "DELETE FROM boxaliment WHERE box_id = '$idBox'";
            $database->execute($deleteBoxAlimentSql);

            // Supprimer les saveurs associées au sushi box de la table boxsaveur
            $deleteBoxSaveurSql = "DELETE FROM boxsaveur WHERE box_id = '$idBox'";
            $database->execute($deleteBoxSaveurSql);

            // Supprimer le sushi box de la table box
            $deleteBoxSql = "DELETE FROM box WHERE id_box = '$idBox'";
            if ($database->execute($deleteBoxSql)) {
                http_response_code(200); // Succès
                echo "Le sushi box a été supprimé avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
            }
        } else {
            http_response_code(400); // Requête incorrecte
        }
        break;
    
    default:
        http_response_code(405); // Méthode non autorisée
        break;
}

// Fermer la connexion à la base de données en utilisant PDO
$database = null;

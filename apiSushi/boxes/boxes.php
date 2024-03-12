<?php

require_once 'connexion.php';


$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Requête pour récupérer la liste des sushi boxes
        $sql = "SELECT b.*, GROUP_CONCAT(s.nom SEPARATOR ', ') as saveurs FROM box b 
                LEFT JOIN boxsaveur bs ON b.id_box = bs.box_id 
                LEFT JOIN saveur s ON bs.saveur_id = s.id_saveur 
                LEFT JOIN boxaliment ba ON b.id_box = ba.box_id 
                LEFT JOIN aliment a ON ba.aliment_id = a.id_aliment 
                GROUP BY b.id_box";
        $result = $connexion->query($sql);

        $sushiBoxes = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
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

        if (isset($data['nom']) && isset($data['pieces']) && isset($data['prix']) && isset($data['image']) && isset($data['saveurs']) && isset($data['aliments'])) {
            $nom = $data['nom'];
            $pieces = $data['pieces'];
            $prix = $data['prix'];
            $image = $data['image'];
            $saveurs = $data['saveurs'];
            $aliments = $data['aliments'];

            // Insérer le sushi box dans la table box
            $sql = "INSERT INTO box (nom, pieces, prix, image) VALUES ('$nom', '$pieces', '$prix', '$image')";

            if ($connexion->query($sql) === TRUE) {
                $boxId = $connexion->insert_id;

                // Insérer les saveurs du sushi box dans la table boxsaveur
                foreach ($saveurs as $saveur) {
                    $saveurSql = "INSERT INTO boxsaveur (box_id, saveur_id) VALUES ('$boxId', '$saveur')";
                    $connexion->query($saveurSql);
                }

                // Insérer les aliments du sushi box dans la table boxaliment
                foreach ($aliments as $aliment) {
                    $alimentSql = "INSERT INTO boxaliment (box_id, aliment_id, quantite) VALUES ('$boxId', '$aliment', 1)";
                    $connexion->query($alimentSql);
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

            if ($connexion->query($sql) === TRUE) {
                // Supprimer les anciennes saveurs et aliments associés au sushi box
                $deleteBoxSaveurSql = "DELETE FROM boxsaveur WHERE box_id = '$idBox'";
                $connexion->query($deleteBoxSaveurSql);

                $deleteBoxAlimentSql = "DELETE FROM boxaliment WHERE box_id = '$idBox'";
                $connexion->query($deleteBoxAlimentSql);

                // Insérer les nouvelles saveurs et aliments du sushi box
                foreach ($saveurs as $saveur) {
                    $saveurSql = "INSERT INTO boxsaveur (box_id, saveur_id) VALUES ('$idBox', '$saveur')";
                    $connexion->query($saveurSql);
                }

                foreach ($aliments as $aliment) {
                    $alimentSql = "INSERT INTO boxaliment (box_id, aliment_id, quantite) VALUES ('$idBox', '$aliment', 1)";
                    $connexion->query($alimentSql);
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
            $connexion->query($deleteBoxAlimentSql);

            // Supprimer les saveurs associées au sushi box de la table boxsaveur
            $deleteBoxSaveurSql = "DELETE FROM boxsaveur WHERE box_id = '$idBox'";
            $connexion->query($deleteBoxSaveurSql);

            // Supprimer le sushi box de la table box
            $deleteBoxSql = "DELETE FROM box WHERE id_box = '$idBox'";
            if ($connexion->query($deleteBoxSql) === TRUE) {
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

// Fermer la connexion à la base de données
$connexion->close();
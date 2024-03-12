<?php

require_once 'database.php';


$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Requête pour récupérer la liste des pilotes
        $sql = "SELECT * FROM Pilotes";
        $result = $conn->query($sql);

        $pilotes = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pilotes[] = $row;
            }
        }
        // Afficher le résultat au format JSON
        header('Content-Type: application/json');
        echo json_encode($pilotes);
        break;
    
    case 'POST':
        // Logique pour ajouter un pilote
        $data = json_decode(file_get_contents("php://input"), true);
        
        if (isset($data['nom']) && isset($data['adresse']) && isset($data['num_pilote'])) {
            $nom = $data['nom'];
            $adresse = $data['adresse'];
            $num_pilote = $data['num_pilote'];
        
            // Échapper les données pour éviter les injections SQL
            $nom = mysqli_real_escape_string($conn, $nom);
            $adresse = mysqli_real_escape_string($conn, $adresse);
        
            // Requête pour insérer le pilote dans la base de données
            $sql = "INSERT INTO Pilotes (num_pilote, nom, adresse) VALUES ('$num_pilote', '$nom', '$adresse')";
        
            if ($conn->query($sql) === TRUE) {
                http_response_code(201); // Créé avec succès
                echo "Le pilote a été ajouté avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
            }
        } else {
            http_response_code(400); 
        }
        break;
    
    case 'PUT':
        // Mettre à jour un pilote
        $data = json_decode(file_get_contents("php://input"), true);
        
        if (isset($data['num_pilote']) && isset($data['nom']) && isset($data['adresse'])) {
            $num_pilote = $data['num_pilote'];
            $nom = $data['nom'];
            $adresse = $data['adresse'];
        
            $sql = "UPDATE Pilotes SET nom='$nom', adresse='$adresse' WHERE num_pilote='$num_pilote'";
        
            if ($conn->query($sql) === TRUE) {
                http_response_code(200); // Succès
                echo "Le pilote a été mis à jour avec succès.";
            } else {
                http_response_code(500); // Erreur de serveur
            }
        } else {
            http_response_code(400); 
        }
        break;
    
    case 'DELETE':
        // Logique pour supprimer un pilote
        $data = json_decode(file_get_contents("php://input"), true);
        
        if (isset($data['num_pilote'])) {
            $num_pilote = $data['num_pilote'];
            
            // Supprimer d'abord les vols associés à ce pilote
            $delete_vols_sql = "DELETE FROM vols WHERE pilote_id='$num_pilote'";
            if ($conn->query($delete_vols_sql) === TRUE) {
            
                $delete_pilote_sql = "DELETE FROM Pilotes WHERE num_pilote='$num_pilote'";
                if ($conn->query($delete_pilote_sql) === TRUE) {
                    http_response_code(200); // Succès
                    echo "Le pilote a été supprimé avec succès.";
                } else {
                    http_response_code(500); // Erreur de serveur
                }
            } else {
                http_response_code(500); 
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
$conn->close();
?>

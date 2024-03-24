<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require "../database/database.php";
require "../boxes/boxes.php";

// Connexion à la base de données
$database = new Database();
$db = $database->getConnection();

// Création de l'objet Box
$box = new Box($db);

// Si aucun ID n'est spécifié dans la requête, on récupère toutes les informations sur les boîtes
if (!isset($_GET["id"])) {
    // Utilisation de la fonction pour récupérer les informations des boîtes
    $stmt = $box->getAllBoxes();
    $itemCount = $stmt->rowCount();
    if ($itemCount > 0) {
        $boxArr = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            // Récupération des aliments associés à la boîte
            $aliments_stmt = $box->getAlimentsByBoxId($id);
            $alimentsArr = [];
            while ($aliment_row = $aliments_stmt->fetch(PDO::FETCH_ASSOC)) {
                $alimentsArr[] = $aliment_row['nom_aliment'];
            }
            // Récupération des saveurs associées à la boîte
            $saveurs_stmt = $box->getSaveursByBoxId($id);
            $saveursArr = [];
            while ($saveur_row = $saveurs_stmt->fetch(PDO::FETCH_ASSOC)) {
                $saveursArr[] = $saveur_row['nom_saveur'];
            }
            // Création du tableau contenant les informations de la boîte
            $boxInfo = [
                "id" => $id,
                "nom" => $nom,
                "pièces" => $pieces,
                "prix" => $prix,
                "image" => $image,
                "aliments" => $alimentsArr,
                "saveurs" => $saveursArr
            ];
            array_push($boxArr, $boxInfo);
        }
        echo json_encode($boxArr); // On renvoie le fichier JSON avec les informations
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Aucune boîte trouvée."]);
    }
} else {
    // Si un ID est spécifié dans la requête, on récupère les informations sur cette boîte spécifique
    $box->id = $_GET["id"];
    
    // Utilisation de la fonction pour récupérer les informations de la boîte
    $stmt = $box->getBox();
    $itemCount = $stmt->rowCount();
    if ($itemCount > 0) {
        $boxArr = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            // Récupération des aliments associés à la boîte
            $aliments_stmt = $box->getAlimentsByBoxId($id);
            $alimentsArr = [];
            while ($aliment_row = $aliments_stmt->fetch(PDO::FETCH_ASSOC)) {
                $alimentsArr[] = $aliment_row['nom_aliment'];
            }
            // Récupération des saveurs associées à la boîte
            $saveurs_stmt = $box->getSaveursByBoxId($id);
            $saveursArr = [];
            while ($saveur_row = $saveurs_stmt->fetch(PDO::FETCH_ASSOC)) {
                $saveursArr[] = $saveur_row['nom_saveur'];
            }
            // Création du tableau contenant les informations de la boîte
            $boxInfo = [
                "id" => $id,
                "nom" => $nom,
                "pièces" => $pieces,
                "prix" => $prix,
                "image" => $image,
                "aliments" => $alimentsArr,
                "saveurs" => $saveursArr
            ];
            array_push($boxArr, $boxInfo);
        }
        echo json_encode($boxArr); // On renvoie le fichier JSON avec les informations
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Aucune boîte trouvée avec cet ID."]);
    }
}
?>

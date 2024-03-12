<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sushi-gr4";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Chemin vers le fichier JSON
$json_file = 'boxes.json';

// Lire le contenu du fichier JSON
$data = file_get_contents($json_file);

// Convertir le JSON en tableau associatif PHP
$boxes = json_decode($data, true);

// Insérer les données dans les tables correspondantes
foreach ($boxes as $box) {
    // Insérer les données de la table 'box'
    $sql = "INSERT INTO box (id_box, nom, pieces, prix, image) 
            VALUES ('" . $box['id'] . "', '" . $box['nom'] . "', '" . $box['pieces'] . "', '" . $box['prix'] . "', '" . $box['image'] . "')";
    $conn->query($sql);

    // Insérer les données de la table 'aliment' et 'boxaliment'
    foreach ($box['aliments'] as $aliment) {
        $sql_aliment = "INSERT INTO aliment (nom) VALUES ('" . $aliment['nom'] . "')";
        $conn->query($sql_aliment);

        // Récupérer l'ID de l'aliment inséré
        $aliment_id = $conn->insert_id;

        $sql_boxaliment = "INSERT INTO boxaliment (box_id, aliment_id, quantite) 
                          VALUES ('" . $box['id'] . "', '" . $aliment_id . "', '" . $aliment['quantite'] . "')";
        $conn->query($sql_boxaliment);
    }

    // Insérer les données de la table 'saveur' et 'boxsaveur'
    foreach ($box['saveurs'] as $saveur) {
        $sql_saveur = "INSERT INTO saveur (nom) VALUES ('" . $saveur . "')";
        $conn->query($sql_saveur);

        // Récupérer l'ID de la saveur insérée
        $saveur_id = $conn->insert_id;

        $sql_boxsaveur = "INSERT INTO boxsaveur (box_id, saveur_id) 
                          VALUES ('" . $box['id'] . "', '" . $saveur_id . "')";
        $conn->query($sql_boxsaveur);
    }
}

echo "Données importées avec succès.";

// Fermer la connexion à la base de données
$conn->close();

?>

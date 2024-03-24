<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'sushi';
    private $conn;

    // Méthode pour établir la connexion à la base de données
    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        
        try {
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
    }

    // Méthode pour obtenir l'objet de connexion
    public function getConnection() {
        return $this->conn;
    }

    // Méthode pour exécuter une requête SQL
    public function query($query, $params = []) {
        $stmt = $this->getConnection()->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Méthode pour exécuter une requête SQL sans récupérer de résultats (INSERT, UPDATE, DELETE)
    public function execute($query, $params = []) {
        $stmt = $this->getConnection()->prepare($query);
        return $stmt->execute($params);
    }
}

?>

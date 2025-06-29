<?php
/**
 * Configuration de la base de données
 * Fichier de configuration pour la connexion à la base de données
 */

class Database {
    private $host = 'localhost';
    private $db_name = 'mon_projet_php';
    private $username = 'root';
    private $password = '';
    private $conn;
    
    /**
     * Obtenir la connexion à la base de données
     */
    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erreur de connexion: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
    
    /**
     * Créer les tables nécessaires
     */
    public function createTables() {
        $sql = "
        CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            sujet VARCHAR(200),
            message TEXT NOT NULL,
            date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        
        CREATE TABLE IF NOT EXISTS visiteurs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ip_address VARCHAR(45),
            user_agent TEXT,
            page_visitee VARCHAR(200),
            date_visite TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ";
        
        try {
            $this->conn->exec($sql);
            return true;
        } catch(PDOException $e) {
            echo "Erreur lors de la création des tables: " . $e->getMessage();
            return false;
        }
    }
}
?>
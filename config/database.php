<?php
// On inclut l'autoload généré par Composer
require_once __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;

/**
 * Classe Database
 * Gère la connexion à MongoDB Atlas via Render
 */
class Database {

    private static $instance = null;
    private $client;
    private $db;

    // Constructeur privé pour le Singleton
    private function __construct() {
        try {
            // 🔥 Récupération de l’URI depuis les variables Render
            $uri = getenv("MONGO_URI");

            if (!$uri) {
                die("❌ ERREUR : La variable d'environnement MONGO_URI n'est pas définie !");
            }

            // Connexion au cluster Atlas
            $this->client = new Client($uri);

            // 🔥 Nom EXACT de ta base
            $this->db = $this->client->selectDatabase("Influ_Manager");

        } catch (Exception $e) {
            die("❌ Erreur de connexion MongoDB : " . $e->getMessage());
        }
    }

    // Singleton : une seule instance de connexion
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Retourne la base
    public function getDB() {
        return $this->db;
    }
}

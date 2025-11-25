<?php
require 'vendor/autoload.php';

$uri = getenv("MONGO_URI");
echo "URI détectée : " . $uri . "\n\n";

try {
    $client = new MongoDB\Client($uri);
    $db = $client->selectDatabase("Influ_Manager");

    echo "✔ Connexion OK\n";
} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

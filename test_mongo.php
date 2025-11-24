<?php
require_once __DIR__ . '/config/database.php';

$db = Database::getInstance()->getDB();
echo "✅ Connexion MongoDB réussie à la base : Influ_Manager";
?>

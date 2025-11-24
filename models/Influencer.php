<?php
require_once __DIR__ . '/../config/database.php';
use MongoDB\BSON\ObjectId;

class Influencer {
    private $collection;

    public function __construct() {
        $db = Database::getInstance()->getDB();
        $this->collection = $db->influencers;
    }

    // 🔹 Convertit l’ID en format correct
    private function formatId($id) {
        if (is_numeric($id)) {
            return intval($id); // ID numérique
        } elseif (is_string($id) && preg_match('/^[a-f0-9]{24}$/i', $id)) {
            return new ObjectId($id); // ObjectId
        }
        return null;
    }

    // 🔹 Récupère tous les influenceurs
    public function getAll() {
        return $this->collection->find()->toArray();
    }

    // 🔹 Récupère un influenceur par ID
    public function getById($id) {
        $validId = $this->formatId($id);
        if (!$validId) return null;
        return $this->collection->findOne(['_id' => $validId]);
    }

    // 🔹 Crée un influenceur avec documents imbriqués (ex : réseaux sociaux)
    public function create($data) {
        if (isset($data['_id'])) {
            $data['_id'] = $this->formatId($data['_id']);
        }

        // Assurez un tableau de réseaux sociaux si vide
        //if (!isset($data['socials'])) {
        // $data['socials'] = [];
       // }

    
       return $this->collection->insertOne($data);
    }

    // 🔹 Met à jour un influenceur
    public function update($id, $data) {
        $validId = $this->formatId($id);
        if (!$validId) return null;
        return $this->collection->updateOne(
            ['_id' => $validId],
            ['$set' => $data]
        );
    }

    // 🔹 Supprime un influenceur
    public function delete($id) {
        $validId = $this->formatId($id);
        if (!$validId) return null;
        return $this->collection->deleteOne(['_id' => $validId]);
    }

    // 🔹 Recherche par niche ou réseau social
    public function search($name = null, $niche = null) {
    $filter = [];

    if ($name) {
        // Recherche insensible à la casse dans full_name ou alias
        $filter['$or'] = [
            ['full_name' => new MongoDB\BSON\Regex($name, 'i')],
            ['alias' => new MongoDB\BSON\Regex($name, 'i')]
        ];
    }

    if ($niche) {
        $filter['niche'] = $niche;
    }

    return $this->collection->find($filter)->toArray();
}


    // 🔹 Agrégation : nombre d’influenceurs par niche
    public function countByNiche() {
        return $this->collection->aggregate([
            ['$group' => ['_id' => '$niche', 'count' => ['$sum' => 1]]]
        ])->toArray();
    }
}
?>
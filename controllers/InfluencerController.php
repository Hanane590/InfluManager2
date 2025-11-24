<?php
require_once __DIR__ . '/../models/Influencer.php';

/**
 * Classe InfluencerController — relie modèle et vues
 */
class InfluencerController {
    private $model;

    public function __construct() {
        $this->model = new Influencer();
    }

    // 🔹 Liste des influenceurs
    public function list() {
        $influencers = $this->model->getAll();
        include __DIR__ . '/../views/list.php';
    }
   public function search() {
    $name = $_GET['full_name'] ?? null;
    $niche = $_GET['niche'] ?? null;

    $influencers = $this->model->search($name, $niche);

    include __DIR__ . '/../views/list.php';
}


    // 🔹 Création
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'full_name' => $_POST['full_name'],
                'alias' => $_POST['alias'],
                'email' => $_POST['email'],
                'niche' => $_POST['niche'],
                'followers' => (int)$_POST['followers'],
                'Platform' => $_POST['platform']
            ];
            $this->model->create($data);
            header('Location: index.php');
            exit;
        } else {
            include __DIR__ . '/../views/create.php';
        }
    }

    // 🔹 Édition
public function edit($id) {

    // Si GET → afficher formulaire
    $influencer = $this->model->getById($id);
    if ($influencer === null) {
        die("<h3 style='color:red;text-align:center;margin-top:30px;'>❌ Influenceur introuvable (ID invalide)</h3>");
    }

    // Si POST → mettre à jour
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'full_name' => $_POST['full_name'],
            'alias' => $_POST['alias'],
            'email' => $_POST['email'],
            'niche' => $_POST['niche'],
            'followers' => (int)$_POST['followers'],
            'Platform' => $_POST['platform']
        ];
        $this->model->update($id, $data);
        header('Location: index.php');
        exit;
    }

    include __DIR__ . '/../views/edit.php';
}



    // 🔹 Suppression
    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php');
        exit;
    }
}
?>

<?php
require_once __DIR__ . '/controllers/InfluencerController.php';


$controller = new InfluencerController();


$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'search':
        $controller->search();
    break;    
    default:
        $controller->list();
        break;
    
}
?>
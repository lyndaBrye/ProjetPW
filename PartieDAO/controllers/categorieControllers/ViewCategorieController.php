<?php
session_start();

class ViewCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }
    public function index() {
        $this->checkAuthentication();
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/Categories/view_categorie.php');
    }
    private function checkAuthentication()
    {
        // Vérifier si l'utilisateur est authentifié en tant qu'administrateur
        if (!isset($_SESSION['email'])) {
            // Rediriger vers la page de connexion si non authentifié
            header('Location: ../../views/Educateur/login.php');
            exit();
        }
    }

    public function viewCategorie($id) {
        // Récupérer le contact à afficher en utilisant son ID
        $categories = $this->categorieDAO->getById($id);

        // Inclure la vue pour afficher les détails du contact
        include('../../views/Categories/view_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new ViewCategorieController($categorieDAO);
$controller->viewCategorie($_GET['id']);


?>


<?php
session_start();

class ViewEducateurController
{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO)
    {
        $this->educateurDAO = $educateurDAO;
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
    public function index() {
        $this->checkAuthentication();

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/Educateur/view_educateur.php');
    }

    public function viewEducateur($id)
    {
        // Récupérer le contact à afficher en utilisant son ID
        $educateur = $this->educateurDAO->getById($id);

        // Inclure la vue pour afficher les détails du contact
        include('../../views/Educateur/view_educateur.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
$educateurDAO = new EducateurDAO(new Connexion());
$controller = new ViewEducateurController($educateurDAO);
$controller->viewEducateur($_GET['id']);





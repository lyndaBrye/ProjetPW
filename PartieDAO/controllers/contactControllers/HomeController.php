<?php
session_start();

class HomeController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
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

        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        $contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('../../views/Contact/home.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new HomeController($contactDAO);
$controller->index();

?>

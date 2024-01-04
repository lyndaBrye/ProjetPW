<?php
session_start();

class ViewContactController {
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
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/Contact/view_contact.php');
    }
    public function viewContact($contactId) {
        // Récupérer le contact à afficher en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        // Inclure la vue pour afficher les détails du contact
        include('../../views/Contact/view_contact.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new ViewContactController($contactDAO);
$controller->viewContact($_GET['id']);


?>


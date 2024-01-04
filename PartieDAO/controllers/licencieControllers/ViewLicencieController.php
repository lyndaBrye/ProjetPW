<?php
session_start();

class ViewLicencieController {
    private $licencieDAO;
    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
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
        include('../../views/Licencies/view_licencie.php');
    }

    public function viewLicencie($id) {
        // Récupérer le contact à afficher en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);

        // Inclure la vue pour afficher les détails du contact
        include('../../views/Licencies/view_licencie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new ViewLicencieController($licencieDAO);
$controller->viewLicencie($_GET['id']);


?>


<?php
session_start();

class HomeController {
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
        // RÃ©cupÃ©rer la liste de tous les licencies depuis le modÃ¨le
        $licencie = $this->licencieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('../../views/Licencies/home.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new HomeController($licencieDAO);
$controller->index();

?>

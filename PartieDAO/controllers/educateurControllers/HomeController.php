<?php
session_start();

class HomeController {
    private $educateurDAO;
    public function __construct(EducateurDAO $educateurDAO) {
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

        $educateurs = $this->educateurDAO->getAll();
        include('../../views/Educateur/home.php');
    }
}
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new HomeController($educateurDAO);
$controller->index();

?>

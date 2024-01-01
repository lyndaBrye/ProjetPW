<?php
class HomeController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
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

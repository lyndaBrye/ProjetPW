<?php
class HomeController {
    private $educateurDAO;
    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }
    public function index() {
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

<?php
class ViewLicencieController {
    private $licencieDAO;
    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
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


<?php
class DeleteLicencieController {
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
    }

    public function deleteLicencie($id) {
        // Récupérer le contact à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);

        if (!$licencie) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La cate n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->licencieDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression .";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('../../views/Licencies/delete_licencie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new DeleteLicencieController($licencieDAO);
$controller->deleteLicencie($_GET['id']);


?>


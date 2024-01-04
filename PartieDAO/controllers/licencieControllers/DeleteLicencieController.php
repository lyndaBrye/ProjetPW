<?php
session_start();

class DeleteLicencieController {
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
        include('../../views/Licencies/delete_licencie.php');
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
                header('Location: ../../views/home.php');
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


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


      public function exportCSV() {
        $this->licencieDAO->exportLicenciesToCSV();
    }

    public function importCSV() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
            $csvFile = $_FILES['csvFile']['tmp_name'];

            // Vérifiez si le fichier a été correctement téléchargé
            if (empty($csvFile) || !file_exists($csvFile)) {
                $_SESSION['import_message'] = "Erreur lors du téléchargement du fichier CSV.";
               // header("Location: LicencieController.php"); // Redirigez vers la page principale ou une autre page en cas d'erreur
                exit();
            }

            // Appeler la fonction d'importation
            $success = $this->licencieDAO->importLicenciesFromCSV($csvFile);

            if ($success) {
                $_SESSION['import_message'] = "Licenciés importés avec succès";
            } else {
                $_SESSION['import_message'] = "Échec de l'importation.";
            }

            // Redirigez ou effectuez d'autres actions si nécessaire
            //header("Location: LicencieController.php"); // Remplacez ceci par l'URL souhaitée
            exit();
        } else {
            // Gérer le cas où le formulaire n'est pas soumis correctement
            $_SESSION['import_message'] = "Formulaire non soumis correctement.";
          //  header("Location: LicencieController.php"); // Redirigez vers la page principale ou une autre page en cas d'erreur
            exit();
        }
    }

}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());
$controller=new HomeController($licencieDAO);

if ( isset($_GET['action']) && $_GET['action'] === 'exportCSV') {
    $controller->exportCSV();
}
if ( isset($_GET['action']) && $_GET['action'] === 'importCSV') {

    $controller->importCSV();
}
$controller->index();

?>

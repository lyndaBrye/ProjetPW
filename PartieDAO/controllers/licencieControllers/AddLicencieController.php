<?php
session_start();

class AddLicencieController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;
    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }

    private function genererNumeroLicence($nom, $prenom) {
        $initiales = strtoupper(substr($nom, 0, 1) . substr($prenom, 0, 1));
        $nombreAleatoire = str_pad(mt_rand(100, 999), 3, '0', STR_PAD_LEFT);
        return $initiales  . $nombreAleatoire;
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
        // Récupérer la liste des contacts et des catégories
        $contacts = $this->contactDAO->getAll();
        $categories = $this->categorieDAO->getAll();
    $this->checkAuthentication();
        // Inclure la vue pour afficher le formulaire d'ajout de licencié
        include('../../views/Licencies/add_licencie.php');
    }

    // Fonction pour ajouter un nouveau licencié
    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
         //   $numeroLicence = $_POST['numero_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $numeroLicence = $this->genererNumeroLicence($nom, $prenom);
            $contactId = $_POST['contact_id'];
            $categorieId = $_POST['categorie_id'];

            // Récupérer l'objet Contact associé à l'ID
            $contact = $this->contactDAO->getById($contactId);

            // Récupérer l'objet Categorie associé à l'ID
            $categorie = $this->categorieDAO->getById($categorieId);

            // Créer un nouvel objet Licencie avec les données du formulaire, le contact et la catégorie associés
            $nouveauLicencie = new LicencieModel(0, $numeroLicence, $nom, $prenom, $contact, $categorie);

            // Appeler la méthode du modèle (LicencieDAO) pour ajouter le licencié
            if ($this->licencieDAO->create($nouveauLicencie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location: ../../views/home.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de licencié
                echo "Erreur lors de l'ajout du licencié.";
            }
        }

        // Récupérer la liste des contacts et des catégories
        $contacts = $this->contactDAO->getAll();
        $categories = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher le formulaire d'ajout de licencié
        include('../../views/Licencies/add_licencie.php');
    }
}

// Initialiser les DAO et le contrôleur
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");

$licencieDAO = new LicencieDAO(new Connexion());
$contactDAO = new ContactDAO(new Connexion());
$categorieDAO = new CategorieDAO(new Connexion());
$controller = new AddLicencieController($licencieDAO, $contactDAO, $categorieDAO);

// Gérer les actions du formulaire
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->addLicencie();
}

?>


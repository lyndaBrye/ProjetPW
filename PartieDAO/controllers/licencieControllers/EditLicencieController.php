<?php
session_start();

class EditLicencieController {
    private $licencieDAO;
    private $categorieDAO;
    private $contactDAO;


    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
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
        include('../../views/Licencies/edit_licencie.php');
    }

    public function editLicencie($id) {
        // Récupérer la catégorie à modifier en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);
        if (!$licencie) {
            // La catégorie n'a pas été trouvée, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvée.";
            return;
        }
        $contacts = $this->contactDAO->getAll();
        $categories = $this->categorieDAO->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
          //  $numero_licence= $_POST['numero_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $categorie_id = $_POST['categorie_id'];
            $contact_id = $_POST['contact_id'];
            $contact = $this->contactDAO->getById($contact_id);
            $categorie = $this->categorieDAO->getById($categorie_id);

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
        //    $licencie->setNumeroLicence($numero_licence);
            $licencie->setContactId($contact);
            $licencie->setCategorieId($categorie);



            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour la catégorie
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails de la catégorie après la modification
                header('Location:  ../../views/home.php?id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour de la catégorie
                echo "Erreur lors de la modification .";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la catégorie
        include('../../views/Licencies/edit_licencie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");

require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");

$licencieDAO = new LicencieDAO(new Connexion());
$categorieDAO = new CategorieDAO(new Connexion());
$contactDAO = new ContactDAO(new Connexion());

$controller = new EditLicencieController($licencieDAO,$contactDAO,$categorieDAO);

// Assurez-vous que l'ID est défini dans la requête GET
if (isset($_GET['id'])) {
    $controller->editLicencie($_GET['id']);
} else {
    // Gérer le cas où l'ID n'est pas défini
    echo "ID non spécifié.";
}
?>

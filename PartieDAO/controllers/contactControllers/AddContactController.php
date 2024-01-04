<?php
session_start();

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");

class AddContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
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
        include('../../views/Contact/add_contact.php');
    }

    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['numero_tel'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouveauContact = new ContactModel(0, $nom, $prenom, $email, $telephone);

            // Appeler la méthode du modèle (ContactDAO) pour ajouter le contact
            if ($this->contactDAO->create($nouveauContact)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location: ../../views/home.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/Contact/add_contact.php');
    }
}

$contactDAO = new ContactDAO(new Connexion());
$controller = new AddContactController($contactDAO);

// Vérifier si l'action est définie dans la requête POST
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->addContact();
}
?>

<?php
session_start();

class EditContactController {
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
        include('../../views/Contact/edit_contact.php');
    }

    public function editContact($contactId) {
        // Récupérer le contact à modifier en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $contact = $this->contactDAO->getById($contactId);
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['numero_tel'];
            // Valider les données du formulaire (ajoutez des validations si nécessaire)
            // Mettre à jour les détails du contact
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTelephone($telephone);
            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->contactDAO->update($contact)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:../../views/home.php?id=' . $contactId);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du contact.";
            }
        }
        // Inclure la vue pour afficher le formulaire de modification du contact
        include('../../views/Contact/edit_contact.php');
    }
}
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new EditContactController($contactDAO);
$controller->editContact($_GET['id']);
?>
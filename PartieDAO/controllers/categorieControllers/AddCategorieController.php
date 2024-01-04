<?php
session_start();

class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        $this->checkAuthentication();
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/Categories/add_categorie.php');
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
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code_raccourci = $_POST['code_raccourci'];


            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouvCategorie = new CategorieModel(0,$nom, $code_raccourci);

            // Appeler la méthode du modèle (ContactDAO) pour ajouter le contact
            if ($this->categorieDAO->create($nouvCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:../../views/home.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/Categories/add_categorie.php');
    }
}


require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new AddCategorieController($categorieDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
$controller->addCategorie();
}


?>


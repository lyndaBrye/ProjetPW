<?php
session_start();

class EditCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }
    public function index() {
        $this->checkAuthentication();
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/Categories/edit_categorie.php');
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
    public function editCategorie($id) {
        // Récupérer la catégorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // La catégorie n'a pas été trouvée, vous pouvez rediriger ou afficher un message d'erreur
            echo "La catégorie n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code_raccourci = $_POST['code_raccourci'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails de la catégorie
            $categorie->setNom($nom);
            $categorie->setCodeRaccourci($code_raccourci);

            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour la catégorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails de la catégorie après la modification
                header('Location:../../views/home.php');

                //header(' Location: HomeController.php?id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour de la catégorie
                echo "Erreur lors de la modification de la catégorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la catégorie
        include('../../views/Categories/edit_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");

$categorieDAO = new CategorieDAO(new Connexion());
$controller = new EditCategorieController($categorieDAO);

// Assurez-vous que l'ID est défini dans la requête GET
if (isset($_GET['id'])) {
    $controller->editCategorie($_GET['id']);
} else {
    // Gérer le cas où l'ID n'est pas défini
    echo "ID de la catégorie non spécifié.";
}
?>

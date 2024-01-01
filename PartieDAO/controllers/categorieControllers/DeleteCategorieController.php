<?php
class DeleteCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteCategorie($id) {
        // Récupérer le contact à supprimer en utilisant son ID
        $categories = $this->categorieDAO->getById($id);

        if (!$categories) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La cate n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->categorieDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression du cate.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('../../views/Categories/delete_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new DeleteCategorieController($categorieDAO);
$controller->deleteCategorie($_GET['id']);


?>


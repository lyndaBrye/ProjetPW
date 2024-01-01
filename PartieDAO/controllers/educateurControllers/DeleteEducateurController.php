<?php

class DeleteEducateurController
{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function deleteEducateur($id) {
        // Récupérer le contact à supprimer en utilisant son ID
        $educateur = $this->educateurDAO->getById($id);

        if (!$educateur) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La cate n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->educateurDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression .";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('../../views/Educateur/delete_educateur.php');
    }
}


require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO(new Connexion());
$controller=new DeleteEducateurController($educateurDAO);
$controller->deleteEducateur($_GET['id']);

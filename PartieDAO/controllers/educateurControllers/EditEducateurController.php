<?php

class EditEducateurController
{
    private $licencieDAO;
    private $educateurDAO;
    public function __construct(EducateurDAO $educateurDAO,LicencieDAO $licencieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
    }
    public function editEducateur($id) {
        // Récupérer la liste des educateurs à modifier en utilisant son ID
        $educateur = $this->educateurDAO->getById($id);
        if (!$educateur) {
            // La catégorie n'a pas été trouvée, vous pouvez rediriger ou afficher un message d'erreur
            echo "L educateur n'a pas été trouvée.";
            return;
        }
        $licencies = $this->licencieDAO->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
 //           $licencie_id= $_POST['licencie_id'];
   //         $mot_de_passe = $_POST['mot_de_passe'];
            $est_administrateur = $_POST['est_administrateur'];
            $email = $_POST['email'];
            // Valider les données du formulaire (ajoutez des validations si nécessaire)
            $educateur->setEmail($email);
     //       $educateur->setLicenceID($licencie_id);
            $educateur->setEstAdministrateur($est_administrateur  == 'oui' ? 1 : 0);
       //     $educateur->setMotDePasse($mot_de_passe);
            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour la catégorie
            if ($this->educateurDAO->update($educateur)) {
                // Rediriger vers la page de détails de la catégorie après la modification
                header('Location: HomeController.php?id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour de la catégorie
                echo "Erreur lors de la modification .";
            }
        }
        // Inclure la vue pour afficher le formulaire de modification de la catégorie
        include('../../views/Educateur/edit_educateur.php');
    }
}
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/EducateurModel.php");
require_once("../../classes/dao/EducateurDAO.php");
require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");
$educateurDAO = new EducateurDAO(new Connexion());
$licencieDAO = new LicencieDAO(new Connexion());
$controller = new EditEducateurController($educateurDAO,$licencieDAO);
// Assurez-vous que l'ID est défini dans la requête GET
if (isset($_GET['id'])) {
    $controller->editEducateur($_GET['id']);
} else {
    // Gérer le cas où l'ID n'est pas défini
    echo "ID non spécifié.";
}
?>

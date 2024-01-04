<?php
session_start();

class AddEducateurController
{
    private $educateurDAO;
    private $licencieDAO;

    public function __construct (EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
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

    public function index(){
    $licencies = $this->licencieDAO->getAll();
    include ('../../views/Educateur/add_educateur.php');
}

    public function add_educateur(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $licencie_id = $_POST['licencie_id'];
                $licencie= $this->licencieDAO->getById($licencie_id);
                $email = $_POST['email'];
                $mot_de_passe = $_POST['mot_de_passe'];
                $est_administrateur = $_POST['est_administrateur'];

                // Valider les données du formulaire
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'Email invalid';
                    return;
                }
                if($this->educateurDAO->getByEmail($email)){
                    echo 'Cet educateur existe déjà !';
                    return;
                }
                // Hasher le mot de passe
                $hmot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $educateur = new EducateurModel("", $licencie,
                    $email, $hmot_de_passe, $est_administrateur  == "oui" ? 1 : 0);
                if ($this->educateurDAO->create($educateur)) {
                    // Rediriger vers la page d'accueil après l'ajout
                    header('Location:../../views/home.php');
                    exit();
                } else {
                    // Gérer les erreurs d'ajout de l'educateur
                    echo "Erreur lors de l'ajout de l'educateur.";
                }
            }
        } catch (Exception $e){
            die("Erreur  : " . $e->getMessage());
        }
    }
}
    require_once("../../config/config.php");
    require_once("../../classes/models/Connexion.php");
    require_once("../../classes/models/EducateurModel.php");
    require_once("../../classes/dao/EducateurDAO.php");
    require_once("../../classes/models/LicencieModel.php");
    require_once("../../classes/dao/LicencieDAO.php");

$licencieDAO = new LicencieDAO(new Connexion());
$educateurDAO = new EducateurDAO(new Connexion());
$controller = new AddEducateurController($educateurDAO, $licencieDAO);

if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->add_educateur();
}

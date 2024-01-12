<?php

class LicencieDAO
{
    private $connexion;
    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau lincie dans la base de donnÃ©es
    public function create(LicencieModel $licencie) {
        try {
            $contactId = $licencie->getcontactID()->getId();
            $categorieId = $licencie->getcategorieID()->getId();
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies (numero_licence, nom, prenom, contact_id_id, categorie_id_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $licencie->getNumeroLicence(),
                $licencie->getNom(),
                $licencie->getPrenom(),
                $contactId,
                $categorieId]);
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $contactDAO= new ContactDAO($this->connexion);
            $categorieDAO= new CategorieDAO($this->connexion);
            $contact =$contactDAO->getById($row['contact_id_id']);
            $categorie=$categorieDAO->getById($row['categorie_id_id']);

            if ($row) {
                return new LicencieModel(
                    $row['id'],
                    $row['numero_licence'],
                    $row['nom'],
                    $row['prenom'],
                    $contact,
                    $categorie
                );
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les contacts
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies");
            $licencie = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contactDAO= new ContactDAO($this->connexion);
                $categorieDAO= new CategorieDAO($this->connexion);
                $contact =$contactDAO->getById($row['contact_id_id']);
                $categorie=$categorieDAO->getById($row['categorie_id_id']);
                $licencie[] = new LicencieModel(
                    $row['id'],
                    $row['numero_licence'],
                    $row['nom'],
                    $row['prenom'],
                   /* $row['categorie_id'],
                    $row['contact_id']);*/
                    $contact   ,
                    $categorie);
            }
            return $licencie;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }


    // MÃ©thode pour mettre Ã  jour un licencie
    public function update(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencies SET nom = ?, prenom = ?, contact_id_id = ?, categorie_id_id = ? WHERE id = ?");
            $stmt->execute([
               // $licencie->getNumeroLicence(),
                $licencie->getNom(),
                $licencie->getPrenom(),
                $licencie->getcontactId()->getId(),
                $licencie->getcategorieID()->getId(),
                $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un contact par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }

    public function exportLicenciesToCSV() {
        // Nom du fichier CSV de sortie
        $csvFileName = 'licencies_export.csv';

        // Ouvrir le fichier en écriture
        $csvFile = fopen($csvFileName, 'w');

        // Écrire l'en-tête CSV
        $delimiteur = "\t";

        fputcsv($csvFile, ['ID', 'Numero Licence', 'Nom', 'Prenom', 'Contact ID', 'Categorie ID'], $delimiteur);


// Écrivez chaque ligne de données avec la tabulation comme délimiteur
       // fputcsv($csvFile, [$id, $numeroLicence, $nom, $prenom, $contactId, $categorieId], $delimiteur);

        // Récupérer la liste des licenciés
        $licencies = $this->getAll();

        // Écrire les données des licenciés dans le fichier CSV
        foreach ($licencies as $licencie) {
            $contact = $licencie->getcontactID();
            $categorie = $licencie->getcategorieID();

            $data = [
                $licencie->getId(),
                $licencie->getNumeroLicence(),
                $licencie->getNom(),
                $licencie->getPrenom(),
                $contact->getId(),
                $categorie->getId()
            ];

            // Écrire la ligne dans le fichier CSV
            fputcsv($csvFile, $data);
        }

        // Fermer le fichier CSV
        fclose($csvFile);

        // Téléchargement du fichier CSV
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
        readfile($csvFileName);

        // Supprimer le fichier CSV après le téléchargement
        unlink($csvFileName);

        exit; // Terminer le script après l'exportation pour éviter la sortie HTML supplémentaire
    }



    public function importLicenciesFromCSV($csvFile) {
        // Ouverture du fichier CSV en lecture
        $csvHandle = fopen($csvFile, 'r');

        if ($csvHandle !== false) {
            // Ignorer l'en-tête CSV
            fgetcsv($csvHandle);

            // Boucle pour lire chaque ligne du fichier CSV
            while (($data = fgetcsv($csvHandle)) !== false) {
                // Récupérer les données de la ligne CSV
                $id = $data[0];
                $numeroLicence = $data[1];
                $nom = $data[2];
                $prenom = $data[3];
                $contactId = $data[4];
                $categorieId = $data[5];

                // Créer un nouvel objet Licencie avec les données du CSV
                $licencie = new LicencieModel($id, $numeroLicence, $nom, $prenom,$contactId,$categorieId);

                // Appeler la méthode du modèle (LicencieDAO) pour ajouter le licencié
                $this->createLicencieCSV($licencie);
            }

            // Fermer le fichier CSV
            fclose($csvHandle);

            return true;
        }

        return false;
    }
    public function createLicencieCSV(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies (numero_licence, nom, prenom, contact_id_id, categorie_id_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $licencie->getNumeroLicence(),
                $licencie->getNom(),
                $licencie->getPrenom(),
                $licencie->getcontactID(),
                $licencie->getcategorieID()]);
            return true;
        } catch (PDOException $e) {
            // Gérer l'erreur
            return false;
        }
    }
}

require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
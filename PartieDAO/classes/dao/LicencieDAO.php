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
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies (numero_licence, nom, prenom, contact_id, categorie_id) VALUES (?, ?, ?, ?, ?)");
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
            $contact =$contactDAO->getById($row['contact_id']);
            $categorie=$categorieDAO->getById($row['categorie_id']);

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
                $contact =$contactDAO->getById($row['contact_id']);
                $categorie=$categorieDAO->getById($row['categorie_id']);
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
            $stmt = $this->connexion->pdo->prepare("UPDATE licencies SET numero_licence = ?, nom = ?, prenom = ?, contact_id = ?, categorie_id = ? WHERE id = ?");
            $stmt->execute([
                $licencie->getNumeroLicence(),
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
}

require_once("../../classes/models/ContactModel.php");
require_once("../../classes/dao/ContactDAO.php");
require_once("../../classes/models/CategorieModel.php");
require_once("../../classes/dao/CategorieDAO.php");
<?php
class EducateurDAO {
    private $connexion;
    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }
    public function create(EducateurModel $educateur) {
        try {
            $licencie = $educateur->getLicenceID()->getId();
            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs (licencie_id, email, mot_de_passe, est_administrateur) VALUES (?, ?, ?, ?)");
            $stmt->execute([
                $licencie,
                $educateur->getEmail(),
                $educateur->getMotDePasse(),
                $educateur->getEstAdministrateur()
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $licencieDAO= new LicencieDAO($this->connexion);
            $licencie =$licencieDAO->getById($row['licencie_id']);
            if ($row) {
                return new EducateurModel($row['id'],
                    $licencie,
                    $row['email'],
                    $row['mot_de_passe'],
                    $row['est_administrateur']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getByEmail($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['id'], $row['licence_id'], $row['email'], $row['mot_de_passe'], $row['est_administrateur']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateurs");
            $educateurs = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencieDAO= new LicencieDAO($this->connexion);
                $licencie =$licencieDAO->getById($row['licencie_id']);
                $educateurs[] = new EducateurModel(
                    $row['id'],
                    $licencie,
                    $row['email'],
                    $row['mot_de_passe'],
                    $row['est_administrateur']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET id = ?, email = ?, est_administrateur = ? WHERE id = ?");
            $stmt->execute([
                $educateur->getIdEducateur(),
               // $educateur->getLicenceID(),
                $educateur->getEmail(),
               // $educateur->getMotDePasse(),
                $educateur->getEstAdministrateur(),
                $educateur->getIdEducateur(),
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM educateurs WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

require_once("../../classes/models/LicencieModel.php");
require_once("../../classes/dao/LicencieDAO.php");

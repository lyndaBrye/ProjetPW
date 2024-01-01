<?php

class CategorieDAO
{
    private $connexion;
    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau contact dans la base de donnÃ©es
    public function create(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO categories (nom, code_raccourci) VALUES ( ?, ?)");
            $stmt->execute([$categorie->getNom(), $categorie->getCodeRaccourci()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new CategorieModel($row['id'],$row['nom'], $row['code_raccourci']);
            } else {
                return null; // Aucune categorie trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les cate
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM categories");
            $categorie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie[] = new CategorieModel($row['id'],$row['nom'], $row['code_raccourci']);
            }

            return $categorie;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un cate
    public function update(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE categories SET nom = ?, code_raccourci = ? WHERE id = ?");
            $stmt->execute([$categorie->getNom(), $categorie->getCodeRaccourci(),$categorie->getId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer une cate par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
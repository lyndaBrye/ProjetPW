<?php
class EducateurModel {
    private $id;
    private $licencie_id;
    private $email;
    private $mot_de_passe;
    private $est_administrateur;

    public function __construct($id, $licencie_id, $email, $mot_de_passe, $est_administrateur) {
        if(is_int($id))
        {
            $this->id = $id;
        }
        $this->licencie_id = $licencie_id;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->est_administrateur = $est_administrateur;
    }

    // Getters
    public function getIdEducateur() { return $this->id; }
    public function getLicenceID() { return $this->licencie_id; }
    public function getEmail() { return $this->email; }
    public function getMotDePasse() { return $this->mot_de_passe; }
    public function getEstAdministrateur() { return $this->est_administrateur; }

    // Setters
   /* public function addEducateur($licencie_id, $email, $mot_de_passe, $est_administrateur){
        $this->licencie_id = $licencie_id;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->est_administrateur = $est_administrateur;
    }*/
    public function setIdEducateur($id) { $this->id = $id; }
    public function setLicenceID($licencie_id) { $this->licencie_id = $licencie_id; }
    public function setEmail($email) { $this->email = $email; }
    public function setMotDePasse($mot_de_passe) { $this->mot_de_passe = $mot_de_passe; }
    public function setEstAdministrateur($est_administrateur) { $this->est_administrateur = $est_administrateur; }
}


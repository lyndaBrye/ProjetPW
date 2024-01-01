<?php
class LicencieModel
{
    private $id;
    private $numero_licence;
    private $nom;
    private $prenom;
    private $contact_id;
    private $categorie_id;
    public function __construct($id,$numero_licence,$nom, $prenom, $contact_id,$categorie_id) {
        $this->id = $id;
        $this->numero_licence=$numero_licence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->categorie_id = $categorie_id;
        $this->contact_id = $contact_id;
    }
    public function getId() {
        return $this->id;
    }
    public function getNumeroLicence() {
        return $this->numero_licence;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getcontactID() {
        return $this->contact_id;
    }
    public function getcategorieID() {
        return $this->categorie_id;
    }
    public function setId($id) {
        $this->id=$id;
    }
    public function setNumeroLicence($numero_licence) {
        $this->numero_licence=$numero_licence;
    }
    public function setNom($nom) {
        $this->nom=$nom;
    }
    public function setPrenom($prenom) {
        $this->prenom=$prenom;
    }
    public function setContactId($contact_id) {
        $this->contact_id=$contact_id;
    }
    public function setCategorieId($categorie_id) {
        $this->categorie_id = $categorie_id;
    }
}
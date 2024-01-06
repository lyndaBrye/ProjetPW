<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_licencie = null;

    #[ORM\ManyToOne(inversedBy: 'licencie_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie_id = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Contact $contact_id = null;

    #[ORM\OneToOne(mappedBy: 'licencie_id', cascade: ['persist', 'remove'])]
    private ?Educateur $educateur_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumeroLicencie(): ?string
    {
        return $this->numero_licencie;
    }

    public function setNumeroLicencie(string $numero_licencie): static
    {
        $this->numero_licencie = $numero_licencie;

        return $this;
    }

    public function getCategorieId(): ?Categorie
    {
        return $this->categorie_id;
    }

    public function setCategorieId(?Categorie $categorie_id): static
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    public function getContactId(): ?Contact
    {
        return $this->contact_id;
    }

    public function setContactId(?Contact $contact_id): static
    {
        $this->contact_id = $contact_id;

        return $this;
    }

    public function getEducateurId(): ?Educateur
    {
        return $this->educateur_id;
    }

    public function setEducateurId(?Educateur $educateur_id): static
    {
        // unset the owning side of the relation if necessary
        if ($educateur_id === null && $this->educateur_id !== null) {
            $this->educateur_id->setLicencieId(null);
        }

        // set the owning side of the relation if necessary
        if ($educateur_id !== null && $educateur_id->getLicencieId() !== $this) {
            $educateur_id->setLicencieId($this);
        }

        $this->educateur_id = $educateur_id;

        return $this;
    }
}

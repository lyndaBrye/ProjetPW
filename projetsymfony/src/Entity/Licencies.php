<?php

namespace App\Entity;

use App\Repository\LicenciesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicenciesRepository::class)]
class Licencies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $numero_licence = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'licencie_id')]
    private ?Contacts $contact_id = null;

    #[ORM\ManyToOne(inversedBy: 'licencie_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $categorie_id = null;

    #[ORM\OneToOne(mappedBy: 'licencie_id', cascade: ['persist', 'remove'])]
    private ?Educateurs $educateurs_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroLicence(): ?string
    {
        return $this->numero_licence;
    }

    public function setNumeroLicence(string $numero_licence): static
    {
        $this->numero_licence = $numero_licence;

        return $this;
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

    public function getContactId(): ?Contacts
    {
        return $this->contact_id;
    }

    public function setContactId(?Contacts $contact_id): static
    {
        $this->contact_id = $contact_id;

        return $this;
    }

    public function getCategorieId(): ?Categories
    {
        return $this->categorie_id;
    }

    public function setCategorieId(?Categories $categorie_id): static
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    public function getEducateursId(): ?Educateurs
    {
        return $this->educateurs_id;
    }

    public function setEducateursId(Educateurs $educateurs_id): static
    {
        // set the owning side of the relation if necessary
        if ($educateurs_id->getLicencieId() !== $this) {
            $educateurs_id->setLicencieId($this);
        }

        $this->educateurs_id = $educateurs_id;

        return $this;
    }
}

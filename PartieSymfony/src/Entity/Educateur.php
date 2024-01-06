<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?bool $est_administrateur = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_de_passe = null;

    #[ORM\OneToOne(inversedBy: 'educateur_id', cascade: ['persist', 'remove'])]
    private ?Licencie $licencie_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function isEstAdministrateur(): ?bool
    {
        return $this->est_administrateur;
    }

    public function setEstAdministrateur(bool $est_administrateur): static
    {
        $this->est_administrateur = $est_administrateur;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getLicencieId(): ?Licencie
    {
        return $this->licencie_id;
    }

    public function setLicencieId(?Licencie $licencie_id): static
    {
        $this->licencie_id = $licencie_id;

        return $this;
    }
}

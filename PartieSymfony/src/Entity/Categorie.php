<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\OneToMany(mappedBy: 'categorie_id', targetEntity: Licencie::class)]
    private Collection $licencie_id;

    public function __construct()
    {
        $this->licencie_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }
    public function __toString(): string
    {
        return $this->nom;
    }

    /**
     * @return Collection<int, Licencie>
     */
    public function getLicencieId(): Collection
    {
        return $this->licencie_id;
    }

    public function addLicencieId(Licencie $licencieId): static
    {
        if (!$this->licencie_id->contains($licencieId)) {
            $this->licencie_id->add($licencieId);
            $licencieId->setCategorieId($this);
        }

        return $this;
    }

    public function removeLicencieId(Licencie $licencieId): static
    {
        if ($this->licencie_id->removeElement($licencieId)) {
            // set the owning side to null (unless already changed)
            if ($licencieId->getCategorieId() === $this) {
                $licencieId->setCategorieId(null);
            }
        }

        return $this;
    }
}

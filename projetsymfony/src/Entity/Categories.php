<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 10)]
    private ?string $code_raccourci = null;

    #[ORM\OneToMany(mappedBy: 'categorie_id', targetEntity: Licencies::class, orphanRemoval: true)]
    private Collection $licencie_id;

    public function __construct()
    {
        $this->licencie_id = new ArrayCollection();
    }

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

    public function getCodeRaccourci(): ?string
    {
        return $this->code_raccourci;
    }

    public function setCodeRaccourci(string $code_raccourci): static
    {
        $this->code_raccourci = $code_raccourci;

        return $this;
    }

    /**
     * @return Collection<int, Licencies>
     */
    public function getLicencieId(): Collection
    {
        return $this->licencie_id;
    }

    public function addLicencieId(Licencies $licencieId): static
    {
        if (!$this->licencie_id->contains($licencieId)) {
            $this->licencie_id->add($licencieId);
            $licencieId->setCategorieId($this);
        }

        return $this;
    }

    public function removeLicencieId(Licencies $licencieId): static
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

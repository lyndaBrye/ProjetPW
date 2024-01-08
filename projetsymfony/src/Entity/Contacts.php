<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
class Contacts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 11)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 15)]
    private ?string $numero_tel = null;

    #[ORM\OneToMany(mappedBy: 'contact_id', targetEntity: Licencies::class)]
    private Collection $licencie_id;

    #[ORM\ManyToMany(targetEntity: MailContact::class, mappedBy: 'destinataire')]
    private Collection $mailRecu;


    public function __construct()
    {
        $this->licencie_id = new ArrayCollection();
        $this->mailRecu = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getNumeroTel(): ?string
    {
        return $this->numero_tel;
    }

    public function setNumeroTel(string $numero_tel): static
    {
        $this->numero_tel = $numero_tel;

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
            $licencieId->setContactId($this);
        }

        return $this;
    }

    public function removeLicencieId(Licencies $licencieId): static
    {
        if ($this->licencie_id->removeElement($licencieId)) {
            // set the owning side to null (unless already changed)
            if ($licencieId->getContactId() === $this) {
                $licencieId->setContactId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MailContact>
     */
    public function getMailRecu(): Collection
    {
        return $this->mailRecu;
    }

    public function addMailRecu(MailContact $mailRecu): static
    {
        if (!$this->mailRecu->contains($mailRecu)) {
            $this->mailRecu->add($mailRecu);
            $mailRecu->addDestinataire($this);
        }

        return $this;
    }

    public function removeMailRecu(MailContact $mailRecu): static
    {
        if ($this->mailRecu->removeElement($mailRecu)) {
            $mailRecu->removeDestinataire($this);
        }

        return $this;
    }

}

<?php

namespace App\Entity;

use App\Repository\MailContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailContactRepository::class)]
class MailContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnvoie = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    #[ORM\ManyToMany(targetEntity: Contacts::class, inversedBy: 'mailRecu', fetch: 'EAGER')]
    #[ORM\JoinTable(name: 'mail_educateur_contact')]
    private Collection $destinataire;

    #[ORM\ManyToOne(inversedBy: 'mailContactEnvoye')]
    #[ORM\JoinColumn(name: 'expediteur_id')]
    private ?Educateurs $expediteur = null;


    public function __construct()
    {
        $this->destinataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnvoie(): ?\DateTimeInterface
    {
        return $this->dateEnvoie;
    }
    public function setDateEnvoie(\DateTimeInterface $dateEnvoie): static
    {
        $this->dateEnvoie = $dateEnvoie;

        return $this;
    }
    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): static
    {
        $this->objet = $objet;
        return $this;
    }

    /**
     * @return Collection<int, Contacts>
     */
    public function getDestinataire(): Collection
    {
        return $this->destinataire;
    }

    public function addDestinataire(Contacts $destinataire): static
    {
        if (!$this->destinataire->contains($destinataire)) {
            $this->destinataire->add($destinataire);
        }
        return $this;
    }

    public function removeDestinataire(Contacts $destinataire): static
    {
        $this->destinataire->removeElement($destinataire);

        return $this;
    }

    public function getExpediteur(): ?Educateurs
    {
        return $this->expediteur;
    }

    public function setExpediteur(?Educateurs $expediteur): static
    {
        $this->expediteur = $expediteur;

        return $this;
    }


}

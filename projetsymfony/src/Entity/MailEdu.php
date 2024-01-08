<?php

namespace App\Entity;

use App\Repository\MailEduRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailEduRepository::class)]
class MailEdu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnvoi = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    #[ORM\ManyToMany(targetEntity: Educateurs::class, inversedBy: 'mailRecu')]
    #[ORM\JoinTable(name: 'mail_edu_educateur')]
    private Collection $destinataire;

    #[ORM\ManyToOne(inversedBy: 'mailEduEnvoye')]
    private ?Educateurs $expediteur = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    public function __construct()
    {
        $this->destinataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): static
    {
        $this->dateEnvoi = $dateEnvoi;

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
     * @return Collection<int, Educateurs>
     */
    public function getDestinataire(): Collection
    {
        return $this->destinataire;
    }

    public function addDestinataire(Educateurs $destinataire): static
    {
        if (!$this->destinataire->contains($destinataire)) {
            $this->destinataire->add($destinataire);
        }

        return $this;
    }

    public function removeDestinataire(Educateurs $destinataire): static
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}

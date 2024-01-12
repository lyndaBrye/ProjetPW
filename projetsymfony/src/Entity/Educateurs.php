<?php

namespace App\Entity;
use App\Repository\EducateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: EducateursRepository::class)]
class Educateurs implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 100)]
    private ?string $email = null;
    #[ORM\Column(length: 255)]
    private ?string $mot_de_passe = null;

    #[ORM\Column]
    private ?bool $est_administrateur = null;

    #[ORM\OneToOne(inversedBy: 'educateurs_id', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Licencies $licencie_id = null;

    #[ORM\ManyToMany(targetEntity: MailEdu::class, mappedBy: 'destinataire')]
    private Collection $mailRecu;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailEdu::class)]
    private Collection $mailEduEnvoye;

    #[ORM\OneToMany(mappedBy: 'expediteur', targetEntity: MailContact::class)]
    private Collection $mailContactEnvoye;

    public function __construct()
    {
        $this->mailRecu = new ArrayCollection();
        $this->mailEduEnvoye = new ArrayCollection();
        $this->mailContactEnvoye = new ArrayCollection();
    }

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

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

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

    public function getLicencieId(): ?Licencies
    {
        return $this->licencie_id;
    }

    public function setLicencieId(Licencies $licencie_id): static
    {
        $this->licencie_id = $licencie_id;

        return $this;
    }

    /**
     * @return Collection<int, MailEdu>
     */
    public function getMailRecu(): Collection
    {
        return $this->mailRecu;
    }

    public function addMailRecu(MailEdu $mailRecu): static
    {
        if (!$this->mailRecu->contains($mailRecu)) {
            $this->mailRecu->add($mailRecu);
            $mailRecu->addDestinataire($this);
        }

        return $this;
    }

    public function removeMailRecu(MailEdu $mailRecu): static
    {
        if ($this->mailRecu->removeElement($mailRecu)) {
            $mailRecu->removeDestinataire($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MailEdu>
     */
    public function getMailEduEnvoye(): Collection
    {
        return $this->mailEduEnvoye;
    }

    public function addMailEduEnvoye(MailEdu $mailEduEnvoye): static
    {
        if (!$this->mailEduEnvoye->contains($mailEduEnvoye)) {
            $this->mailEduEnvoye->add($mailEduEnvoye);
            $mailEduEnvoye->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailEduEnvoye(MailEdu $mailEduEnvoye): static
    {
        if ($this->mailEduEnvoye->removeElement($mailEduEnvoye)) {
            // set the owning side to null (unless already changed)
            if ($mailEduEnvoye->getExpediteur() === $this) {
                $mailEduEnvoye->setExpediteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MailContact>
     */
    public function getMailContactEnvoye(): Collection
    {
        return $this->mailContactEnvoye;
    }

    public function addMailContactEnvoye(MailContact $mailContactEnvoye): static
    {
        if (!$this->mailContactEnvoye->contains($mailContactEnvoye)) {
            $this->mailContactEnvoye->add($mailContactEnvoye);
            $mailContactEnvoye->setExpediteur($this);
        }

        return $this;
    }

    public function removeMailContactEnvoye(MailContact $mailContactEnvoye): static
    {
        if ($this->mailContactEnvoye->removeElement($mailContactEnvoye)) {
            // set the owning side to null (unless already changed)
            if ($mailContactEnvoye->getExpediteur() === $this) {
                $mailContactEnvoye->setExpediteur(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        // TODO: Implement getPassword() method.
        return $this->mot_de_passe;
    }

    public function getRoles(): array
    {
        $admin =$this->est_administrateur;
        // TODO: Implement getRoles() method.
        if ($admin==1){
            $roles[]='ROLE_ADMIN';
        }
        $roles[]='ROLE_USER';
        return array_unique($roles);

    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
        // TODO: Implement getUserIdentifier() method.
    }
}

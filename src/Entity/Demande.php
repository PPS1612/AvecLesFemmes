<?php

namespace App\Entity;

use App\Enum\StatutDemande;
use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $motif = null;

    #[ORM\Column(enumType: StatutDemande::class)]
    private ?StatutDemande $statutDemande = null;

    #[ORM\Column]
    private ?float $montantDemande = null;

    #[ORM\Column]
    private ?\DateTime $dateDemande = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateTraitement = null;

    #[ORM\ManyToOne(inversedBy: 'demandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Participation $participation = null;

    #[ORM\ManyToOne(inversedBy: 'demandes')]
    private ?Admin $admin = null;

    #[ORM\OneToOne(mappedBy: 'demande')]
    private ?Pret $pret = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getStatutDemande(): ?StatutDemande
    {
        return $this->statutDemande;
    }

    public function setStatutDemande(StatutDemande $statutDemande): static
    {
        $this->statutDemande = $statutDemande;

        return $this;
    }

    public function getMontantDemande(): ?float
    {
        return $this->montantDemande;
    }

    public function setMontantDemande(float $montantDemande): static
    {
        $this->montantDemande = $montantDemande;

        return $this;
    }

    public function getDateDemande(): ?\DateTime
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTime $dateDemande): static
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    public function getDateTraitement(): ?\DateTime
    {
        return $this->dateTraitement;
    }

    public function setDateTraitement(?\DateTime $dateTraitement): static
    {
        $this->dateTraitement = $dateTraitement;

        return $this;
    }

    public function getParticipation(): ?Participation
    {
        return $this->participation;
    }

    public function setParticipation(?Participation $participation): static
    {
        $this->participation = $participation;

        return $this;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function setAdmin(?Admin $admin): static
    {
        $this->admin = $admin;

        return $this;
    }

    public function getPret(): ?Pret
    {
        return $this->pret;
    }

    public function setPret(?Pret $pret): static
    {
        $this->pret = $pret;

        return $this;
    }
}
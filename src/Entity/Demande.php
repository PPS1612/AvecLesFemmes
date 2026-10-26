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

    #[ORM\Column]
    private ?\DateTime $dateTraitement = null;

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

    public function setDateTraitement(\DateTime $dateTraitement): static
    {
        $this->dateTraitement = $dateTraitement;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Enum\ModeRemboursement;
use App\Repository\PretRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PretRepository::class)]
class Pret
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column]
    private ?\DateTime $datSouscription = null;

    #[ORM\Column]
    private ?\DateTime $dateEcheance = null;

    #[ORM\Column]
    private ?float $montantInteret = null;

    #[ORM\Column(enumType: ModeRemboursement::class)]
    private ?ModeRemboursement $modeRemboursement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDatSouscription(): ?\DateTime
    {
        return $this->datSouscription;
    }

    public function setDatSouscription(\DateTime $datSouscription): static
    {
        $this->datSouscription = $datSouscription;

        return $this;
    }

    public function getDateEcheance(): ?\DateTime
    {
        return $this->dateEcheance;
    }

    public function setDateEcheance(\DateTime $dateEcheance): static
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    public function getMontantInteret(): ?float
    {
        return $this->montantInteret;
    }

    public function setMontantInteret(float $montantInteret): static
    {
        $this->montantInteret = $montantInteret;

        return $this;
    }

    public function getModeRemboursement(): ?ModeRemboursement
    {
        return $this->modeRemboursement;
    }

    public function setModeRemboursement(ModeRemboursement $modeRemboursement): static
    {
        $this->modeRemboursement = $modeRemboursement;

        return $this;
    }
}

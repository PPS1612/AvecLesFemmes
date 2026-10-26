<?php

namespace App\Entity;

use App\Enum\ModeRemboursement;
use App\Repository\PretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?\DateTime $dateSouscription = null;

    #[ORM\Column]
    private ?\DateTime $dateEcheance = null;

    #[ORM\Column]
    private ?float $montantInteret = null;

    #[ORM\Column(enumType: ModeRemboursement::class)]
    private ?ModeRemboursement $modeRemboursement = null;

    #[ORM\OneToOne(inversedBy: 'pret')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Demande $demande = null;

    /**
     * @var Collection<int, Remboursement>
     */
    #[ORM\OneToMany(targetEntity: Remboursement::class, mappedBy: 'pret')]
    private Collection $remboursements;

    public function __construct()
    {
        $this->remboursements = new ArrayCollection();
    }

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

    public function getDateSouscription(): ?\DateTime
    {
        return $this->dateSouscription;
    }

    public function setDateSouscription(\DateTime $dateSouscription): static
    {
        $this->dateSouscription = $dateSouscription;

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

    public function getDemande(): ?Demande
    {
        return $this->demande;
    }

    public function setDemande(Demande $demande): static
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * @return Collection<int, Remboursement>
     */
    public function getRemboursements(): Collection
    {
        return $this->remboursements;
    }

    public function addRemboursement(Remboursement $remboursement): static
    {
        if (!$this->remboursements->contains($remboursement)) {
            $this->remboursements->add($remboursement);
            $remboursement->setPret($this);
        }

        return $this;
    }

    public function removeRemboursement(Remboursement $remboursement): static
    {
        if ($this->remboursements->removeElement($remboursement)) {
            // set the owning side to null (unless already changed)
            if ($remboursement->getPret() === $this) {
                $remboursement->setPret(null);
            }
        }

        return $this;
    }
}

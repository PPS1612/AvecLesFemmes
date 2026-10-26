<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateInscription = null;

    #[ORM\Column(nullable: true)]
    private ?float $montantCotisation = null;

    #[ORM\Column]
    private ?bool $isTotale = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Membre $membre = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Campagne $campagne = null;

    /**
     * @var Collection<int, Versement>
     */
    #[ORM\OneToMany(targetEntity: Versement::class, mappedBy: 'participation')]
    private Collection $versements;

    #[ORM\OneToOne(inversedBy: 'participation', cascade: ['persist', 'remove'])]
    private ?Cagnote $cagnote = null;

    /**
     * @var Collection<int, Demande>
     */
    #[ORM\OneToMany(targetEntity: Demande::class, mappedBy: 'participation')]
    private Collection $demandes;

    public function __construct()
    {
        $this->versements = new ArrayCollection();
        $this->demandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTime
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTime $dateInscription): static
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getMontantCotisation(): ?float
    {
        return $this->montantCotisation;
    }

    public function setMontantCotisation(?float $montantCotisation): static
    {
        $this->montantCotisation = $montantCotisation;

        return $this;
    }

    public function isTotale(): ?bool
    {
        return $this->isTotale;
    }

    public function setIsTotale(bool $isTotale): static
    {
        $this->isTotale = $isTotale;

        return $this;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): static
    {
        $this->membre = $membre;

        return $this;
    }

    public function getCampagne(): ?Campagne
    {
        return $this->campagne;
    }

    public function setCampagne(?Campagne $campagne): static
    {
        $this->campagne = $campagne;

        return $this;
    }

    /**
     * @return Collection<int, Versement>
     */
    public function getVersements(): Collection
    {
        return $this->versements;
    }

    public function addVersement(Versement $versement): static
    {
        if (!$this->versements->contains($versement)) {
            $this->versements->add($versement);
            $versement->setParticipation($this);
        }

        return $this;
    }

    public function removeVersement(Versement $versement): static
    {
        if ($this->versements->removeElement($versement)) {
            // set the owning side to null (unless already changed)
            if ($versement->getParticipation() === $this) {
                $versement->setParticipation(null);
            }
        }

        return $this;
    }

    public function getCagnote(): ?Cagnote
    {
        return $this->cagnote;
    }

    public function setCagnote(?Cagnote $cagnote): static
    {
        $this->cagnote = $cagnote;

        return $this;
    }

    /**
     * @return Collection<int, Demande>
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demande $demande): static
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes->add($demande);
            $demande->setParticipation($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): static
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getParticipation() === $this) {
                $demande->setParticipation(null);
            }
        }

        return $this;
    }
}
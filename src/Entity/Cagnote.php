<?php

namespace App\Entity;

use App\Repository\CagnoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CagnoteRepository::class)]
class Cagnote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateAttribution = null;

    #[ORM\Column(nullable: true)]
    private ?float $montantTheorique = null;

    #[ORM\Column(nullable: true)]
    private ?float $montantAttribue = null;

    #[ORM\Column]
    private ?int $ordrePassage = null;

    #[ORM\OneToOne(mappedBy: 'cagnote')]
    private ?Participation $participation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAttribution(): ?\DateTime
    {
        return $this->dateAttribution;
    }

    public function setDateAttribution(?\DateTime $dateAttribution): static
    {
        $this->dateAttribution = $dateAttribution;

        return $this;
    }

    public function getMontantTheorique(): ?float
    {
        return $this->montantTheorique;
    }

    public function setMontantTheorique(?float $montantTheorique): static
    {
        $this->montantTheorique = $montantTheorique;

        return $this;
    }

    public function getMontantAttribue(): ?float
    {
        return $this->montantAttribue;
    }

    public function setMontantAttribue(?float $montantAttribue): static
    {
        $this->montantAttribue = $montantAttribue;

        return $this;
    }

    public function getOrdrePassage(): ?int
    {
        return $this->ordrePassage;
    }

    public function setOrdrePassage(int $ordrePassage): static
    {
        $this->ordrePassage = $ordrePassage;

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
}
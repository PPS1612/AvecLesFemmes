<?php

namespace App\Entity;

use App\Enum\StatutVersement;
use App\Repository\VersementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VersementRepository::class)]
class Versement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $datePrevue = null;

    #[ORM\Column(enumType: StatutVersement::class)]
    private ?StatutVersement $statutVersement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateRattrapage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePrevue(): ?\DateTime
    {
        return $this->datePrevue;
    }

    public function setDatePrevue(\DateTime $datePrevue): static
    {
        $this->datePrevue = $datePrevue;

        return $this;
    }

    public function getStatutVersement(): ?StatutVersement
    {
        return $this->statutVersement;
    }

    public function setStatutVersement(StatutVersement $statutVersement): static
    {
        $this->statutVersement = $statutVersement;

        return $this;
    }

    public function getDateRattrapage(): ?\DateTime
    {
        return $this->dateRattrapage;
    }

    public function setDateRattrapage(\DateTime $dateRattrapage): static
    {
        $this->dateRattrapage = $dateRattrapage;

        return $this;
    }
}

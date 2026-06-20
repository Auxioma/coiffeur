<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\EstablishmentOpeningHourRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstablishmentOpeningHourRepository::class)]
#[ORM\Table(name: 'establishment_opening_hour')]
#[ORM\HasLifecycleCallbacks]
class EstablishmentOpeningHour
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $weekday = 1;

    #[ORM\Column]
    private bool $isOpen = true;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $morningStart = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $morningEnd = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $afternoonStart = null;

    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $afternoonEnd = null;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeekday(): int
    {
        return $this->weekday;
    }

    public function setWeekday(int $weekday): static
    {
        $this->weekday = $weekday;

        return $this;
    }

    public function isIsOpen(): bool
    {
        return $this->isOpen;
    }

    public function setIsOpen(bool $isOpen): static
    {
        $this->isOpen = $isOpen;

        return $this;
    }

    public function getMorningStart(): ?\DateTimeInterface
    {
        return $this->morningStart;
    }

    public function setMorningStart(?\DateTimeInterface $morningStart): static
    {
        $this->morningStart = $morningStart;

        return $this;
    }

    public function getMorningEnd(): ?\DateTimeInterface
    {
        return $this->morningEnd;
    }

    public function setMorningEnd(?\DateTimeInterface $morningEnd): static
    {
        $this->morningEnd = $morningEnd;

        return $this;
    }

    public function getAfternoonStart(): ?\DateTimeInterface
    {
        return $this->afternoonStart;
    }

    public function setAfternoonStart(?\DateTimeInterface $afternoonStart): static
    {
        $this->afternoonStart = $afternoonStart;

        return $this;
    }

    public function getAfternoonEnd(): ?\DateTimeInterface
    {
        return $this->afternoonEnd;
    }

    public function setAfternoonEnd(?\DateTimeInterface $afternoonEnd): static
    {
        $this->afternoonEnd = $afternoonEnd;

        return $this;
    }

    public function getEstablishment(): ?Establishment
    {
        return $this->establishment;
    }

    public function setEstablishment(?Establishment $establishment): static
    {
        $this->establishment = $establishment;

        return $this;
    }

}

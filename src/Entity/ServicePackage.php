<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\ServicePackageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicePackageRepository::class)]
#[ORM\Table(name: 'service_package')]
#[ORM\HasLifecycleCallbacks]
class ServicePackage
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 160)]
    private ?string $name = null;

    #[ORM\Column(length: 190)]
    private ?string $slug = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private int $totalDurationMinutes = 0;

    #[ORM\Column]
    private int $priceCents = 0;

    #[ORM\Column(length: 3)]
    private string $currency = 'EUR';

    #[ORM\Column]
    private bool $isBookableOnline = true;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTotalDurationMinutes(): int
    {
        return $this->totalDurationMinutes;
    }

    public function setTotalDurationMinutes(int $totalDurationMinutes): static
    {
        $this->totalDurationMinutes = $totalDurationMinutes;

        return $this;
    }

    public function getPriceCents(): int
    {
        return $this->priceCents;
    }

    public function setPriceCents(int $priceCents): static
    {
        $this->priceCents = $priceCents;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function isIsBookableOnline(): bool
    {
        return $this->isBookableOnline;
    }

    public function setIsBookableOnline(bool $isBookableOnline): static
    {
        $this->isBookableOnline = $isBookableOnline;

        return $this;
    }

    public function isIsActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

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

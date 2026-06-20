<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\SubscriptionPlanRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionPlanRepository::class)]
#[ORM\Table(name: 'subscription_plan')]
#[ORM\HasLifecycleCallbacks]
class SubscriptionPlan
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80, unique: true)]
    private ?string $code = null;

    #[ORM\Column(length: 120)]
    private ?string $name = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private int $maxEstablishments = 1;

    #[ORM\Column]
    private int $maxStaff = 3;

    #[ORM\Column(nullable: true)]
    private ?int $maxMonthlyAppointments = null;

    #[ORM\Column]
    private bool $hasSms = false;

    #[ORM\Column]
    private bool $hasMarketing = false;

    #[ORM\Column]
    private bool $hasMultiEstablishment = false;

    #[ORM\Column]
    private bool $hasAdvancedReports = false;

    #[ORM\Column]
    private bool $isActive = true;

    /**
     * @var Collection<int, SubscriptionPlanPrice>
     */
    #[ORM\OneToMany(targetEntity: SubscriptionPlanPrice::class, mappedBy: 'plan', cascade: ['persist', 'remove'])]
    private Collection $prices;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMaxEstablishments(): int
    {
        return $this->maxEstablishments;
    }

    public function setMaxEstablishments(int $maxEstablishments): static
    {
        $this->maxEstablishments = $maxEstablishments;

        return $this;
    }

    public function getMaxStaff(): int
    {
        return $this->maxStaff;
    }

    public function setMaxStaff(int $maxStaff): static
    {
        $this->maxStaff = $maxStaff;

        return $this;
    }

    public function getMaxMonthlyAppointments(): ?int
    {
        return $this->maxMonthlyAppointments;
    }

    public function setMaxMonthlyAppointments(?int $maxMonthlyAppointments): static
    {
        $this->maxMonthlyAppointments = $maxMonthlyAppointments;

        return $this;
    }

    public function isHasSms(): bool
    {
        return $this->hasSms;
    }

    public function setHasSms(bool $hasSms): static
    {
        $this->hasSms = $hasSms;

        return $this;
    }

    public function isHasMarketing(): bool
    {
        return $this->hasMarketing;
    }

    public function setHasMarketing(bool $hasMarketing): static
    {
        $this->hasMarketing = $hasMarketing;

        return $this;
    }

    public function isHasMultiEstablishment(): bool
    {
        return $this->hasMultiEstablishment;
    }

    public function setHasMultiEstablishment(bool $hasMultiEstablishment): static
    {
        $this->hasMultiEstablishment = $hasMultiEstablishment;

        return $this;
    }

    public function isHasAdvancedReports(): bool
    {
        return $this->hasAdvancedReports;
    }

    public function setHasAdvancedReports(bool $hasAdvancedReports): static
    {
        $this->hasAdvancedReports = $hasAdvancedReports;

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

    /**
     * @return Collection<int, SubscriptionPlanPrice>
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

}

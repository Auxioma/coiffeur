<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\SubscriptionPlanPriceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionPlanPriceRepository::class)]
#[ORM\Table(name: 'subscription_plan_price')]
#[ORM\HasLifecycleCallbacks]
class SubscriptionPlanPrice
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private string $billingInterval = 'monthly';

    #[ORM\Column(length: 3)]
    private string $currency = 'EUR';

    #[ORM\Column]
    private int $amountCents = 0;

    #[ORM\Column(length: 190, unique: true, nullable: true)]
    private ?string $stripePriceId = null;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\ManyToOne(targetEntity: SubscriptionPlan::class, inversedBy: 'prices')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?SubscriptionPlan $plan = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBillingInterval(): string
    {
        return $this->billingInterval;
    }

    public function setBillingInterval(string $billingInterval): static
    {
        $this->billingInterval = $billingInterval;

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

    public function getAmountCents(): int
    {
        return $this->amountCents;
    }

    public function setAmountCents(int $amountCents): static
    {
        $this->amountCents = $amountCents;

        return $this;
    }

    public function getStripePriceId(): ?string
    {
        return $this->stripePriceId;
    }

    public function setStripePriceId(?string $stripePriceId): static
    {
        $this->stripePriceId = $stripePriceId;

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

    public function getPlan(): ?SubscriptionPlan
    {
        return $this->plan;
    }

    public function setPlan(?SubscriptionPlan $plan): static
    {
        $this->plan = $plan;

        return $this;
    }

}

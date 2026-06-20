<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\SubscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionRepository::class)]
#[ORM\Table(name: 'subscription')]
#[ORM\HasLifecycleCallbacks]
class Subscription
{
    use CreatedAtTraits;
    use UpdatedAtTraits;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private string $status = 'incomplete';

    #[ORM\Column(length: 190, unique: true, nullable: true)]
    private ?string $stripeSubscriptionId = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $trialEndsAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $currentPeriodStartsAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $currentPeriodEndsAt = null;

    #[ORM\Column]
    private bool $cancelAtPeriodEnd = false;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $canceledAt = null;

    #[ORM\ManyToOne(targetEntity: ProfessionalAccount::class, inversedBy: 'subscriptions')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?ProfessionalAccount $professionalAccount = null;

    #[ORM\ManyToOne(targetEntity: SubscriptionPlanPrice::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?SubscriptionPlanPrice $planPrice = null;

    /**
     * @var Collection<int, SubscriptionInvoice>
     */
    #[ORM\OneToMany(
        targetEntity: SubscriptionInvoice::class,
        mappedBy: 'subscription',
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    private Collection $invoices;

    public function __construct()
    {
        $this->invoices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getStripeSubscriptionId(): ?string
    {
        return $this->stripeSubscriptionId;
    }

    public function setStripeSubscriptionId(?string $stripeSubscriptionId): static
    {
        $this->stripeSubscriptionId = $stripeSubscriptionId;

        return $this;
    }

    public function getTrialEndsAt(): ?\DateTimeImmutable
    {
        return $this->trialEndsAt;
    }

    public function setTrialEndsAt(?\DateTimeImmutable $trialEndsAt): static
    {
        $this->trialEndsAt = $trialEndsAt;

        return $this;
    }

    public function getCurrentPeriodStartsAt(): ?\DateTimeImmutable
    {
        return $this->currentPeriodStartsAt;
    }

    public function setCurrentPeriodStartsAt(?\DateTimeImmutable $currentPeriodStartsAt): static
    {
        $this->currentPeriodStartsAt = $currentPeriodStartsAt;

        return $this;
    }

    public function getCurrentPeriodEndsAt(): ?\DateTimeImmutable
    {
        return $this->currentPeriodEndsAt;
    }

    public function setCurrentPeriodEndsAt(?\DateTimeImmutable $currentPeriodEndsAt): static
    {
        $this->currentPeriodEndsAt = $currentPeriodEndsAt;

        return $this;
    }

    public function isCancelAtPeriodEnd(): bool
    {
        return $this->cancelAtPeriodEnd;
    }

    public function setCancelAtPeriodEnd(bool $cancelAtPeriodEnd): static
    {
        $this->cancelAtPeriodEnd = $cancelAtPeriodEnd;

        return $this;
    }

    public function getCanceledAt(): ?\DateTimeImmutable
    {
        return $this->canceledAt;
    }

    public function setCanceledAt(?\DateTimeImmutable $canceledAt): static
    {
        $this->canceledAt = $canceledAt;

        return $this;
    }

    public function getProfessionalAccount(): ?ProfessionalAccount
    {
        return $this->professionalAccount;
    }

    public function setProfessionalAccount(?ProfessionalAccount $professionalAccount): static
    {
        $this->professionalAccount = $professionalAccount;

        return $this;
    }

    public function getPlanPrice(): ?SubscriptionPlanPrice
    {
        return $this->planPrice;
    }

    public function setPlanPrice(?SubscriptionPlanPrice $planPrice): static
    {
        $this->planPrice = $planPrice;

        return $this;
    }

    /**
     * @return Collection<int, SubscriptionInvoice>
     */
    public function getInvoices(): Collection
    {
        return $this->invoices;
    }

    public function addInvoice(SubscriptionInvoice $invoice): static
    {
        if (!$this->invoices->contains($invoice)) {
            $this->invoices->add($invoice);
            $invoice->setSubscription($this);
        }

        return $this;
    }

    public function removeInvoice(SubscriptionInvoice $invoice): static
    {
        if ($this->invoices->removeElement($invoice)) {
            if ($invoice->getSubscription() === $this) {
                $invoice->setSubscription(null);
            }
        }

        return $this;
    }
}
<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\SubscriptionPaymentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionPaymentRepository::class)]
#[ORM\Table(name: 'subscription_payment')]
#[ORM\HasLifecycleCallbacks]
class SubscriptionPayment
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 190, unique: true, nullable: true)]
    private ?string $stripePaymentIntentId = null;

    #[ORM\Column]
    private int $amountCents = 0;

    #[ORM\Column(length: 3)]
    private string $currency = 'EUR';

    #[ORM\Column(length: 30)]
    private string $status = 'pending';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $failureReason = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $paidAt = null;

    #[ORM\ManyToOne(targetEntity: SubscriptionInvoice::class, inversedBy: 'payments')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?SubscriptionInvoice $invoice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStripePaymentIntentId(): ?string
    {
        return $this->stripePaymentIntentId;
    }

    public function setStripePaymentIntentId(?string $stripePaymentIntentId): static
    {
        $this->stripePaymentIntentId = $stripePaymentIntentId;

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

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;

        return $this;
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

    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }

    public function setFailureReason(?string $failureReason): static
    {
        $this->failureReason = $failureReason;

        return $this;
    }

    public function getPaidAt(): ?\DateTimeImmutable
    {
        return $this->paidAt;
    }

    public function setPaidAt(?\DateTimeImmutable $paidAt): static
    {
        $this->paidAt = $paidAt;

        return $this;
    }

    public function getInvoice(): ?SubscriptionInvoice
    {
        return $this->invoice;
    }

    public function setInvoice(?SubscriptionInvoice $invoice): static
    {
        $this->invoice = $invoice;

        return $this;
    }

}

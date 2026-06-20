<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\SubscriptionInvoiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionInvoiceRepository::class)]
#[ORM\Table(name: 'subscription_invoice')]
#[ORM\HasLifecycleCallbacks]
class SubscriptionInvoice
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80, unique: true, nullable: true)]
    private ?string $invoiceNumber = null;

    #[ORM\Column(length: 190, unique: true, nullable: true)]
    private ?string $stripeInvoiceId = null;

    #[ORM\Column(length: 3)]
    private string $currency = 'EUR';

    #[ORM\Column]
    private int $subtotalCents = 0;

    #[ORM\Column]
    private int $taxCents = 0;

    #[ORM\Column]
    private int $totalCents = 0;

    #[ORM\Column(length: 30)]
    private string $status = 'draft';

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $hostedInvoiceUrl = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $pdfUrl = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $issuedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $paidAt = null;

    #[ORM\ManyToOne(targetEntity: Subscription::class, inversedBy: 'invoices')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Subscription $subscription = null;

    /**
     * @var Collection<int, SubscriptionPayment>
     */
    #[ORM\OneToMany(targetEntity: SubscriptionPayment::class, mappedBy: 'invoice')]
    private Collection $payments;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?string $invoiceNumber): static
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getStripeInvoiceId(): ?string
    {
        return $this->stripeInvoiceId;
    }

    public function setStripeInvoiceId(?string $stripeInvoiceId): static
    {
        $this->stripeInvoiceId = $stripeInvoiceId;

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

    public function getSubtotalCents(): int
    {
        return $this->subtotalCents;
    }

    public function setSubtotalCents(int $subtotalCents): static
    {
        $this->subtotalCents = $subtotalCents;

        return $this;
    }

    public function getTaxCents(): int
    {
        return $this->taxCents;
    }

    public function setTaxCents(int $taxCents): static
    {
        $this->taxCents = $taxCents;

        return $this;
    }

    public function getTotalCents(): int
    {
        return $this->totalCents;
    }

    public function setTotalCents(int $totalCents): static
    {
        $this->totalCents = $totalCents;

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

    public function getHostedInvoiceUrl(): ?string
    {
        return $this->hostedInvoiceUrl;
    }

    public function setHostedInvoiceUrl(?string $hostedInvoiceUrl): static
    {
        $this->hostedInvoiceUrl = $hostedInvoiceUrl;

        return $this;
    }

    public function getPdfUrl(): ?string
    {
        return $this->pdfUrl;
    }

    public function setPdfUrl(?string $pdfUrl): static
    {
        $this->pdfUrl = $pdfUrl;

        return $this;
    }

    public function getIssuedAt(): ?\DateTimeImmutable
    {
        return $this->issuedAt;
    }

    public function setIssuedAt(?\DateTimeImmutable $issuedAt): static
    {
        $this->issuedAt = $issuedAt;

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

    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(?Subscription $subscription): static
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * @return Collection<int, SubscriptionPayment>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

}

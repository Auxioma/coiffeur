<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Entity\Traits\DeletedAtTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
#[ORM\Table(name: 'appointment')]
#[ORM\Index(name: 'IDX_APPOINTMENT_STATUS', fields: ['status'])]
#[ORM\Index(name: 'IDX_APPOINTMENT_STARTS_AT', fields: ['startsAt'])]
#[ORM\HasLifecycleCallbacks]
class Appointment
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    use DeletedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 26, unique: true, nullable: true)]
    private ?string $publicId = null;

    #[ORM\Column(length: 30)]
    private string $origin = 'online';

    #[ORM\Column(length: 40)]
    private string $status = 'draft';

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $startsAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $endsAt = null;

    #[ORM\Column]
    private int $totalDurationMinutes = 0;

    #[ORM\Column]
    private int $totalPriceCents = 0;

    #[ORM\Column(length: 3)]
    private string $currency = 'EUR';

    #[ORM\Column(length: 20)]
    private string $paymentMode = 'on_site';

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $cancellationPolicyAcceptedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $presenceConfirmedAt = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $clientNote = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $internalNote = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cancellationReason = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $cancelledAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $confirmedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $completedAt = null;

    #[ORM\ManyToOne(targetEntity: Establishment::class, inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?User $client = null;

    #[ORM\ManyToOne(targetEntity: EstablishmentMember::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?EstablishmentMember $mainMember = null;

    /**
     * @var Collection<int, AppointmentItem>
     */
    #[ORM\OneToMany(targetEntity: AppointmentItem::class, mappedBy: 'appointment', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicId(): ?string
    {
        return $this->publicId;
    }

    public function setPublicId(?string $publicId): static
    {
        $this->publicId = $publicId;

        return $this;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): static
    {
        $this->origin = $origin;

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

    public function getStartsAt(): ?\DateTimeImmutable
    {
        return $this->startsAt;
    }

    public function setStartsAt(?\DateTimeImmutable $startsAt): static
    {
        $this->startsAt = $startsAt;

        return $this;
    }

    public function getEndsAt(): ?\DateTimeImmutable
    {
        return $this->endsAt;
    }

    public function setEndsAt(?\DateTimeImmutable $endsAt): static
    {
        $this->endsAt = $endsAt;

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

    public function getTotalPriceCents(): int
    {
        return $this->totalPriceCents;
    }

    public function setTotalPriceCents(int $totalPriceCents): static
    {
        $this->totalPriceCents = $totalPriceCents;

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

    public function getPaymentMode(): string
    {
        return $this->paymentMode;
    }

    public function setPaymentMode(string $paymentMode): static
    {
        $this->paymentMode = $paymentMode;

        return $this;
    }

    public function getCancellationPolicyAcceptedAt(): ?\DateTimeImmutable
    {
        return $this->cancellationPolicyAcceptedAt;
    }

    public function setCancellationPolicyAcceptedAt(?\DateTimeImmutable $cancellationPolicyAcceptedAt): static
    {
        $this->cancellationPolicyAcceptedAt = $cancellationPolicyAcceptedAt;

        return $this;
    }

    public function getPresenceConfirmedAt(): ?\DateTimeImmutable
    {
        return $this->presenceConfirmedAt;
    }

    public function setPresenceConfirmedAt(?\DateTimeImmutable $presenceConfirmedAt): static
    {
        $this->presenceConfirmedAt = $presenceConfirmedAt;

        return $this;
    }

    public function getClientNote(): ?string
    {
        return $this->clientNote;
    }

    public function setClientNote(?string $clientNote): static
    {
        $this->clientNote = $clientNote;

        return $this;
    }

    public function getInternalNote(): ?string
    {
        return $this->internalNote;
    }

    public function setInternalNote(?string $internalNote): static
    {
        $this->internalNote = $internalNote;

        return $this;
    }

    public function getCancellationReason(): ?string
    {
        return $this->cancellationReason;
    }

    public function setCancellationReason(?string $cancellationReason): static
    {
        $this->cancellationReason = $cancellationReason;

        return $this;
    }

    public function getCancelledAt(): ?\DateTimeImmutable
    {
        return $this->cancelledAt;
    }

    public function setCancelledAt(?\DateTimeImmutable $cancelledAt): static
    {
        $this->cancelledAt = $cancelledAt;

        return $this;
    }

    public function getConfirmedAt(): ?\DateTimeImmutable
    {
        return $this->confirmedAt;
    }

    public function setConfirmedAt(?\DateTimeImmutable $confirmedAt): static
    {
        $this->confirmedAt = $confirmedAt;

        return $this;
    }

    public function getCompletedAt(): ?\DateTimeImmutable
    {
        return $this->completedAt;
    }

    public function setCompletedAt(?\DateTimeImmutable $completedAt): static
    {
        $this->completedAt = $completedAt;

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

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getMainMember(): ?EstablishmentMember
    {
        return $this->mainMember;
    }

    public function setMainMember(?EstablishmentMember $mainMember): static
    {
        $this->mainMember = $mainMember;

        return $this;
    }

    /**
     * @return Collection<int, AppointmentItem>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

}

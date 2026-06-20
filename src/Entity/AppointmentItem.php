<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\AppointmentItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentItemRepository::class)]
#[ORM\Table(name: 'appointment_item')]
#[ORM\HasLifecycleCallbacks]
class AppointmentItem
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 190)]
    private ?string $label = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $startsAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $endsAt = null;

    #[ORM\Column]
    private int $durationMinutes = 0;

    #[ORM\Column]
    private int $priceCents = 0;

    #[ORM\Column]
    private int $sortOrder = 0;

    #[ORM\ManyToOne(targetEntity: Appointment::class, inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Appointment $appointment = null;

    #[ORM\ManyToOne(targetEntity: Service::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Service $service = null;

    #[ORM\ManyToOne(targetEntity: ServiceVariant::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?ServiceVariant $serviceVariant = null;

    #[ORM\ManyToOne(targetEntity: EstablishmentMember::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?EstablishmentMember $member = null;

    #[ORM\ManyToOne(targetEntity: PhysicalResource::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?PhysicalResource $resource = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

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

    public function getDurationMinutes(): int
    {
        return $this->durationMinutes;
    }

    public function setDurationMinutes(int $durationMinutes): static
    {
        $this->durationMinutes = $durationMinutes;

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

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getAppointment(): ?Appointment
    {
        return $this->appointment;
    }

    public function setAppointment(?Appointment $appointment): static
    {
        $this->appointment = $appointment;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getServiceVariant(): ?ServiceVariant
    {
        return $this->serviceVariant;
    }

    public function setServiceVariant(?ServiceVariant $serviceVariant): static
    {
        $this->serviceVariant = $serviceVariant;

        return $this;
    }

    public function getMember(): ?EstablishmentMember
    {
        return $this->member;
    }

    public function setMember(?EstablishmentMember $member): static
    {
        $this->member = $member;

        return $this;
    }

    public function getResource(): ?PhysicalResource
    {
        return $this->resource;
    }

    public function setResource(?PhysicalResource $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

}

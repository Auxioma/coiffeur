<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\AppointmentStatusHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentStatusHistoryRepository::class)]
#[ORM\Table(name: 'appointment_status_history')]
#[ORM\HasLifecycleCallbacks]
class AppointmentStatusHistory
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80, nullable: true)]
    private ?string $oldStatus = null;

    #[ORM\Column(length: 80)]
    private ?string $newStatus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reason = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $changedAt = null;

    #[ORM\ManyToOne(targetEntity: Appointment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Appointment $appointment = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?User $changedBy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOldStatus(): ?string
    {
        return $this->oldStatus;
    }

    public function setOldStatus(?string $oldStatus): static
    {
        $this->oldStatus = $oldStatus;

        return $this;
    }

    public function getNewStatus(): ?string
    {
        return $this->newStatus;
    }

    public function setNewStatus(?string $newStatus): static
    {
        $this->newStatus = $newStatus;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function getChangedAt(): ?\DateTimeImmutable
    {
        return $this->changedAt;
    }

    public function setChangedAt(?\DateTimeImmutable $changedAt): static
    {
        $this->changedAt = $changedAt;

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

    public function getChangedBy(): ?User
    {
        return $this->changedBy;
    }

    public function setChangedBy(?User $changedBy): static
    {
        $this->changedBy = $changedBy;

        return $this;
    }

}

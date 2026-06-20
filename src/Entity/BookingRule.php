<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\BookingRuleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRuleRepository::class)]
#[ORM\Table(name: 'booking_rule')]
#[ORM\UniqueConstraint(name: 'UNIQ_BOOKING_RULE_ESTABLISHMENT', fields: ['establishment'])]
#[ORM\HasLifecycleCallbacks]
class BookingRule
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $minDelayBeforeBookingMinutes = 120;

    #[ORM\Column]
    private int $maxBookingAheadDays = 90;

    #[ORM\Column]
    private int $cancellationLimitHours = 24;

    #[ORM\Column]
    private int $maxActiveFutureAppointmentsNewClient = 1;

    #[ORM\Column]
    private bool $allowStaffChoice = true;

    #[ORM\Column(length: 20)]
    private string $confirmationMode = 'auto';

    #[ORM\Column]
    private bool $presenceConfirmationEnabled = true;

    #[ORM\Column]
    private int $presenceConfirmationHoursBefore = 24;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinDelayBeforeBookingMinutes(): int
    {
        return $this->minDelayBeforeBookingMinutes;
    }

    public function setMinDelayBeforeBookingMinutes(int $minDelayBeforeBookingMinutes): static
    {
        $this->minDelayBeforeBookingMinutes = $minDelayBeforeBookingMinutes;

        return $this;
    }

    public function getMaxBookingAheadDays(): int
    {
        return $this->maxBookingAheadDays;
    }

    public function setMaxBookingAheadDays(int $maxBookingAheadDays): static
    {
        $this->maxBookingAheadDays = $maxBookingAheadDays;

        return $this;
    }

    public function getCancellationLimitHours(): int
    {
        return $this->cancellationLimitHours;
    }

    public function setCancellationLimitHours(int $cancellationLimitHours): static
    {
        $this->cancellationLimitHours = $cancellationLimitHours;

        return $this;
    }

    public function getMaxActiveFutureAppointmentsNewClient(): int
    {
        return $this->maxActiveFutureAppointmentsNewClient;
    }

    public function setMaxActiveFutureAppointmentsNewClient(int $maxActiveFutureAppointmentsNewClient): static
    {
        $this->maxActiveFutureAppointmentsNewClient = $maxActiveFutureAppointmentsNewClient;

        return $this;
    }

    public function isAllowStaffChoice(): bool
    {
        return $this->allowStaffChoice;
    }

    public function setAllowStaffChoice(bool $allowStaffChoice): static
    {
        $this->allowStaffChoice = $allowStaffChoice;

        return $this;
    }

    public function getConfirmationMode(): string
    {
        return $this->confirmationMode;
    }

    public function setConfirmationMode(string $confirmationMode): static
    {
        $this->confirmationMode = $confirmationMode;

        return $this;
    }

    public function isPresenceConfirmationEnabled(): bool
    {
        return $this->presenceConfirmationEnabled;
    }

    public function setPresenceConfirmationEnabled(bool $presenceConfirmationEnabled): static
    {
        $this->presenceConfirmationEnabled = $presenceConfirmationEnabled;

        return $this;
    }

    public function getPresenceConfirmationHoursBefore(): int
    {
        return $this->presenceConfirmationHoursBefore;
    }

    public function setPresenceConfirmationHoursBefore(int $presenceConfirmationHoursBefore): static
    {
        $this->presenceConfirmationHoursBefore = $presenceConfirmationHoursBefore;

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

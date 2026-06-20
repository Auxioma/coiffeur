<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\NotificationPreferenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationPreferenceRepository::class)]
#[ORM\Table(name: 'notification_preference')]
#[ORM\HasLifecycleCallbacks]
class NotificationPreference
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private bool $appointmentEmail = true;

    #[ORM\Column]
    private bool $appointmentSms = true;

    #[ORM\Column]
    private bool $marketingEmail = false;

    #[ORM\Column]
    private bool $marketingSms = false;

    #[ORM\Column]
    private bool $proDailyDigest = true;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAppointmentEmail(): bool
    {
        return $this->appointmentEmail;
    }

    public function setAppointmentEmail(bool $appointmentEmail): static
    {
        $this->appointmentEmail = $appointmentEmail;

        return $this;
    }

    public function isAppointmentSms(): bool
    {
        return $this->appointmentSms;
    }

    public function setAppointmentSms(bool $appointmentSms): static
    {
        $this->appointmentSms = $appointmentSms;

        return $this;
    }

    public function isMarketingEmail(): bool
    {
        return $this->marketingEmail;
    }

    public function setMarketingEmail(bool $marketingEmail): static
    {
        $this->marketingEmail = $marketingEmail;

        return $this;
    }

    public function isMarketingSms(): bool
    {
        return $this->marketingSms;
    }

    public function setMarketingSms(bool $marketingSms): static
    {
        $this->marketingSms = $marketingSms;

        return $this;
    }

    public function isProDailyDigest(): bool
    {
        return $this->proDailyDigest;
    }

    public function setProDailyDigest(bool $proDailyDigest): static
    {
        $this->proDailyDigest = $proDailyDigest;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

}

<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\NotificationLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationLogRepository::class)]
#[ORM\Table(name: 'notification_log')]
#[ORM\HasLifecycleCallbacks]
class NotificationLog
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $templateCode = null;

    #[ORM\Column(length: 20)]
    private string $channel = 'email';

    #[ORM\Column(length: 190)]
    private ?string $recipient = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $subject = null;

    #[ORM\Column(length: 30)]
    private string $status = 'queued';

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $providerMessageId = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $failureReason = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $sentAt = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: Appointment::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Appointment $appointment = null;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Establishment $establishment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemplateCode(): ?string
    {
        return $this->templateCode;
    }

    public function setTemplateCode(?string $templateCode): static
    {
        $this->templateCode = $templateCode;

        return $this;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function setChannel(string $channel): static
    {
        $this->channel = $channel;

        return $this;
    }

    public function getRecipient(): ?string
    {
        return $this->recipient;
    }

    public function setRecipient(?string $recipient): static
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): static
    {
        $this->subject = $subject;

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

    public function getProviderMessageId(): ?string
    {
        return $this->providerMessageId;
    }

    public function setProviderMessageId(?string $providerMessageId): static
    {
        $this->providerMessageId = $providerMessageId;

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

    public function getSentAt(): ?\DateTimeImmutable
    {
        return $this->sentAt;
    }

    public function setSentAt(?\DateTimeImmutable $sentAt): static
    {
        $this->sentAt = $sentAt;

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

    public function getAppointment(): ?Appointment
    {
        return $this->appointment;
    }

    public function setAppointment(?Appointment $appointment): static
    {
        $this->appointment = $appointment;

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

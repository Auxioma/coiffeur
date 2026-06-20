<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\WebhookEventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WebhookEventRepository::class)]
#[ORM\Table(name: 'webhook_event')]
#[ORM\HasLifecycleCallbacks]
class WebhookEvent
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $provider = null;

    #[ORM\Column(length: 190)]
    private ?string $eventId = null;

    #[ORM\Column(length: 190)]
    private ?string $eventType = null;

    #[ORM\Column(type: 'json')]
    private array $payload = [];

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $processedAt = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $processingError = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(?string $provider): static
    {
        $this->provider = $provider;

        return $this;
    }

    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    public function setEventId(?string $eventId): static
    {
        $this->eventId = $eventId;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    public function setEventType(?string $eventType): static
    {
        $this->eventType = $eventType;

        return $this;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function setPayload(array $payload): static
    {
        $this->payload = $payload;

        return $this;
    }

    public function getProcessedAt(): ?\DateTimeImmutable
    {
        return $this->processedAt;
    }

    public function setProcessedAt(?\DateTimeImmutable $processedAt): static
    {
        $this->processedAt = $processedAt;

        return $this;
    }

    public function getProcessingError(): ?string
    {
        return $this->processingError;
    }

    public function setProcessingError(?string $processingError): static
    {
        $this->processingError = $processingError;

        return $this;
    }

}

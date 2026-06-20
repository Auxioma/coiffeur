<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\NotificationTemplateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationTemplateRepository::class)]
#[ORM\Table(name: 'notification_template')]
#[ORM\HasLifecycleCallbacks]
class NotificationTemplate
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120, unique: true)]
    private ?string $code = null;

    #[ORM\Column(length: 20)]
    private string $channel = 'email';

    #[ORM\Column(length: 30)]
    private string $audience = 'client';

    #[ORM\Column(length: 10)]
    private string $locale = 'fr';

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $subject = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $bodyHtml = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $bodyText = null;

    #[ORM\Column]
    private bool $isActive = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): static
    {
        $this->code = $code;

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

    public function getAudience(): string
    {
        return $this->audience;
    }

    public function setAudience(string $audience): static
    {
        $this->audience = $audience;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): static
    {
        $this->locale = $locale;

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

    public function getBodyHtml(): ?string
    {
        return $this->bodyHtml;
    }

    public function setBodyHtml(?string $bodyHtml): static
    {
        $this->bodyHtml = $bodyHtml;

        return $this;
    }

    public function getBodyText(): ?string
    {
        return $this->bodyText;
    }

    public function setBodyText(?string $bodyText): static
    {
        $this->bodyText = $bodyText;

        return $this;
    }

    public function isIsActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

}

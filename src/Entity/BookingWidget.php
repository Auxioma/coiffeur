<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\BookingWidgetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingWidgetRepository::class)]
#[ORM\Table(name: 'booking_widget')]
#[ORM\HasLifecycleCallbacks]
class BookingWidget
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120, unique: true)]
    private ?string $publicKey = null;

    #[ORM\Column(length: 7)]
    private string $themeColor = '#0D5C46';

    #[ORM\Column(length: 80)]
    private string $buttonLabel = 'Prendre RDV';

    #[ORM\Column(type: 'json')]
    private array $allowedDomains = [];

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    public function setPublicKey(?string $publicKey): static
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    public function getThemeColor(): string
    {
        return $this->themeColor;
    }

    public function setThemeColor(string $themeColor): static
    {
        $this->themeColor = $themeColor;

        return $this;
    }

    public function getButtonLabel(): string
    {
        return $this->buttonLabel;
    }

    public function setButtonLabel(string $buttonLabel): static
    {
        $this->buttonLabel = $buttonLabel;

        return $this;
    }

    public function getAllowedDomains(): array
    {
        return $this->allowedDomains;
    }

    public function setAllowedDomains(array $allowedDomains): static
    {
        $this->allowedDomains = $allowedDomains;

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

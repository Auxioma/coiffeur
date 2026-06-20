<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\LocaleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocaleRepository::class)]
#[ORM\Table(name: 'locale')]
#[ORM\HasLifecycleCallbacks]
class Locale
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, unique: true)]
    private ?string $code = null;

    #[ORM\Column(length: 120)]
    private ?string $name = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $nativeName = null;

    #[ORM\Column(length: 3)]
    private string $direction = 'ltr';

    #[ORM\Column]
    private bool $isDefault = false;

    #[ORM\Column]
    private bool $isEnabled = true;

    #[ORM\Column]
    private int $sortOrder = 0;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getNativeName(): ?string
    {
        return $this->nativeName;
    }

    public function setNativeName(?string $nativeName): static
    {
        $this->nativeName = $nativeName;

        return $this;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): static
    {
        $this->direction = $direction;

        return $this;
    }

    public function isIsDefault(): bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): static
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    public function isIsEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): static
    {
        $this->isEnabled = $isEnabled;

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

}

<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\Table(name: 'country')]
#[ORM\HasLifecycleCallbacks]
class Country
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2, unique: true)]
    private ?string $code = null;

    #[ORM\Column(length: 120)]
    private ?string $name = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $nativeName = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $defaultLocale = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $currencyCode = null;

    #[ORM\Column(length: 12, nullable: true)]
    private ?string $phonePrefix = null;

    #[ORM\Column]
    private bool $isEnabled = true;

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

    public function getDefaultLocale(): ?string
    {
        return $this->defaultLocale;
    }

    public function setDefaultLocale(?string $defaultLocale): static
    {
        $this->defaultLocale = $defaultLocale;

        return $this;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(?string $currencyCode): static
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    public function getPhonePrefix(): ?string
    {
        return $this->phonePrefix;
    }

    public function setPhonePrefix(?string $phonePrefix): static
    {
        $this->phonePrefix = $phonePrefix;

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

}

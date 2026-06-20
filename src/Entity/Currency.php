<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\CurrencyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
#[ORM\Table(name: 'currency')]
#[ORM\HasLifecycleCallbacks]
class Currency
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3, unique: true)]
    private ?string $code = null;

    #[ORM\Column(length: 120)]
    private ?string $name = null;

    #[ORM\Column(length: 12, nullable: true)]
    private ?string $symbol = null;

    #[ORM\Column]
    private int $minorUnit = 2;

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

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(?string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getMinorUnit(): int
    {
        return $this->minorUnit;
    }

    public function setMinorUnit(int $minorUnit): static
    {
        $this->minorUnit = $minorUnit;

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

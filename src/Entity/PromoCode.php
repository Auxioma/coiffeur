<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\PromoCodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromoCodeRepository::class)]
#[ORM\Table(name: 'promo_code')]
#[ORM\HasLifecycleCallbacks]
class PromoCode
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $code = null;

    #[ORM\Column(length: 160)]
    private ?string $label = null;

    #[ORM\Column(length: 30)]
    private string $discountType = 'percent';

    #[ORM\Column]
    private int $discountValue = 0;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $validFrom = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $validUntil = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxUses = null;

    #[ORM\Column]
    private int $currentUses = 0;

    #[ORM\Column]
    private bool $firstVisitOnly = false;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getDiscountType(): string
    {
        return $this->discountType;
    }

    public function setDiscountType(string $discountType): static
    {
        $this->discountType = $discountType;

        return $this;
    }

    public function getDiscountValue(): int
    {
        return $this->discountValue;
    }

    public function setDiscountValue(int $discountValue): static
    {
        $this->discountValue = $discountValue;

        return $this;
    }

    public function getValidFrom(): ?\DateTimeImmutable
    {
        return $this->validFrom;
    }

    public function setValidFrom(?\DateTimeImmutable $validFrom): static
    {
        $this->validFrom = $validFrom;

        return $this;
    }

    public function getValidUntil(): ?\DateTimeImmutable
    {
        return $this->validUntil;
    }

    public function setValidUntil(?\DateTimeImmutable $validUntil): static
    {
        $this->validUntil = $validUntil;

        return $this;
    }

    public function getMaxUses(): ?int
    {
        return $this->maxUses;
    }

    public function setMaxUses(?int $maxUses): static
    {
        $this->maxUses = $maxUses;

        return $this;
    }

    public function getCurrentUses(): int
    {
        return $this->currentUses;
    }

    public function setCurrentUses(int $currentUses): static
    {
        $this->currentUses = $currentUses;

        return $this;
    }

    public function isFirstVisitOnly(): bool
    {
        return $this->firstVisitOnly;
    }

    public function setFirstVisitOnly(bool $firstVisitOnly): static
    {
        $this->firstVisitOnly = $firstVisitOnly;

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

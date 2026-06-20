<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\ClientProfileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientProfileRepository::class)]
#[ORM\Table(name: 'client_profile')]
#[ORM\HasLifecycleCallbacks]
class ClientProfile
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $defaultCity = null;

    #[ORM\Column]
    private bool $marketingEmailConsent = false;

    #[ORM\Column]
    private bool $marketingSmsConsent = false;

    #[ORM\Column]
    private bool $photoConsent = false;

    #[ORM\Column]
    private int $reliabilityScore = 100;

    #[ORM\Column]
    private int $noShowCount = 0;

    #[ORM\OneToOne(targetEntity: User::class, inversedBy: 'clientProfile')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getDefaultCity(): ?string
    {
        return $this->defaultCity;
    }

    public function setDefaultCity(?string $defaultCity): static
    {
        $this->defaultCity = $defaultCity;

        return $this;
    }

    public function isMarketingEmailConsent(): bool
    {
        return $this->marketingEmailConsent;
    }

    public function setMarketingEmailConsent(bool $marketingEmailConsent): static
    {
        $this->marketingEmailConsent = $marketingEmailConsent;

        return $this;
    }

    public function isMarketingSmsConsent(): bool
    {
        return $this->marketingSmsConsent;
    }

    public function setMarketingSmsConsent(bool $marketingSmsConsent): static
    {
        $this->marketingSmsConsent = $marketingSmsConsent;

        return $this;
    }

    public function isPhotoConsent(): bool
    {
        return $this->photoConsent;
    }

    public function setPhotoConsent(bool $photoConsent): static
    {
        $this->photoConsent = $photoConsent;

        return $this;
    }

    public function getReliabilityScore(): int
    {
        return $this->reliabilityScore;
    }

    public function setReliabilityScore(int $reliabilityScore): static
    {
        $this->reliabilityScore = $reliabilityScore;

        return $this;
    }

    public function getNoShowCount(): int
    {
        return $this->noShowCount;
    }

    public function setNoShowCount(int $noShowCount): static
    {
        $this->noShowCount = $noShowCount;

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

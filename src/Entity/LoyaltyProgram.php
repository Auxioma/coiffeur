<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\LoyaltyProgramRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoyaltyProgramRepository::class)]
#[ORM\Table(name: 'loyalty_program')]
#[ORM\HasLifecycleCallbacks]
class LoyaltyProgram
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 160)]
    private ?string $name = null;

    #[ORM\Column(type: 'text')]
    private ?string $ruleDescription = null;

    #[ORM\Column]
    private int $visitsRequired = 10;

    #[ORM\Column(length: 160)]
    private ?string $rewardLabel = null;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRuleDescription(): ?string
    {
        return $this->ruleDescription;
    }

    public function setRuleDescription(?string $ruleDescription): static
    {
        $this->ruleDescription = $ruleDescription;

        return $this;
    }

    public function getVisitsRequired(): int
    {
        return $this->visitsRequired;
    }

    public function setVisitsRequired(int $visitsRequired): static
    {
        $this->visitsRequired = $visitsRequired;

        return $this;
    }

    public function getRewardLabel(): ?string
    {
        return $this->rewardLabel;
    }

    public function setRewardLabel(?string $rewardLabel): static
    {
        $this->rewardLabel = $rewardLabel;

        return $this;
    }

    public function isActive(): bool
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

<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\LoyaltyAccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoyaltyAccountRepository::class)]
#[ORM\Table(name: 'loyalty_account')]
#[ORM\UniqueConstraint(name: 'UNIQ_LOYALTY_ACCOUNT_CLIENT_PROGRAM', fields: ['client', 'loyaltyProgram'])]
#[ORM\HasLifecycleCallbacks]
class LoyaltyAccount
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $visitsCount = 0;

    #[ORM\Column]
    private int $rewardsAvailable = 0;

    #[ORM\ManyToOne(targetEntity: LoyaltyProgram::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?LoyaltyProgram $loyaltyProgram = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisitsCount(): int
    {
        return $this->visitsCount;
    }

    public function setVisitsCount(int $visitsCount): static
    {
        $this->visitsCount = $visitsCount;

        return $this;
    }

    public function getRewardsAvailable(): int
    {
        return $this->rewardsAvailable;
    }

    public function setRewardsAvailable(int $rewardsAvailable): static
    {
        $this->rewardsAvailable = $rewardsAvailable;

        return $this;
    }

    public function getLoyaltyProgram(): ?LoyaltyProgram
    {
        return $this->loyaltyProgram;
    }

    public function setLoyaltyProgram(?LoyaltyProgram $loyaltyProgram): static
    {
        $this->loyaltyProgram = $loyaltyProgram;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): static
    {
        $this->client = $client;

        return $this;
    }

}

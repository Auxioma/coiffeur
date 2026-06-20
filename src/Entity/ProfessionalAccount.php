<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Entity\Traits\DeletedAtTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\ProfessionalAccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionalAccountRepository::class)]
#[ORM\Table(name: 'professional_account')]
#[ORM\HasLifecycleCallbacks]
class ProfessionalAccount
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    use DeletedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 190)]
    private ?string $legalName = null;

    #[ORM\Column(length: 80, nullable: true)]
    private ?string $legalForm = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $vatNumber = null;

    #[ORM\Column(length: 190)]
    private ?string $billingEmail = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $billingPhone = null;

    #[ORM\Column(length: 2)]
    private string $billingCountryCode = 'FR';

    #[ORM\Column(length: 190, unique: true, nullable: true)]
    private ?string $stripeCustomerId = null;

    #[ORM\Column(length: 40)]
    private string $onboardingStatus = 'draft';

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'professionalAccounts')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?User $owner = null;

    /**
     * @var Collection<int, Establishment>
     */
    #[ORM\OneToMany(targetEntity: Establishment::class, mappedBy: 'professionalAccount')]
    private Collection $establishments;

    /**
     * @var Collection<int, Subscription>
     */
    #[ORM\OneToMany(targetEntity: Subscription::class, mappedBy: 'professionalAccount')]
    private Collection $subscriptions;

    public function __construct()
    {
        $this->establishments = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLegalName(): ?string
    {
        return $this->legalName;
    }

    public function setLegalName(?string $legalName): static
    {
        $this->legalName = $legalName;

        return $this;
    }

    public function getLegalForm(): ?string
    {
        return $this->legalForm;
    }

    public function setLegalForm(?string $legalForm): static
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function setVatNumber(?string $vatNumber): static
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    public function getBillingEmail(): ?string
    {
        return $this->billingEmail;
    }

    public function setBillingEmail(?string $billingEmail): static
    {
        $this->billingEmail = $billingEmail;

        return $this;
    }

    public function getBillingPhone(): ?string
    {
        return $this->billingPhone;
    }

    public function setBillingPhone(?string $billingPhone): static
    {
        $this->billingPhone = $billingPhone;

        return $this;
    }

    public function getBillingCountryCode(): string
    {
        return $this->billingCountryCode;
    }

    public function setBillingCountryCode(string $billingCountryCode): static
    {
        $this->billingCountryCode = $billingCountryCode;

        return $this;
    }

    public function getStripeCustomerId(): ?string
    {
        return $this->stripeCustomerId;
    }

    public function setStripeCustomerId(?string $stripeCustomerId): static
    {
        $this->stripeCustomerId = $stripeCustomerId;

        return $this;
    }

    public function getOnboardingStatus(): string
    {
        return $this->onboardingStatus;
    }

    public function setOnboardingStatus(string $onboardingStatus): static
    {
        $this->onboardingStatus = $onboardingStatus;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, Establishment>
     */
    public function getEstablishments(): Collection
    {
        return $this->establishments;
    }

    /**
     * @return Collection<int, Subscription>
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

}

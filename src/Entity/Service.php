<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[ORM\Table(name: 'service')]
#[ORM\HasLifecycleCallbacks]
class Service
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 160)]
    private ?string $name = null;

    #[ORM\Column(length: 190)]
    private ?string $slug = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private int $durationMinutes = 30;

    #[ORM\Column]
    private int $bufferBeforeMinutes = 0;

    #[ORM\Column]
    private int $bufferAfterMinutes = 0;

    #[ORM\Column]
    private int $priceCents = 0;

    #[ORM\Column(length: 3)]
    private string $currency = 'EUR';

    #[ORM\Column(length: 20)]
    private string $priceLabel = 'fixed';

    #[ORM\Column]
    private bool $isBookableOnline = true;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\Column]
    private bool $requiresConfirmation = false;

    #[ORM\Column]
    private int $sortOrder = 0;

    #[ORM\ManyToOne(targetEntity: Establishment::class, inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    #[ORM\ManyToOne(targetEntity: ServiceCategory::class, inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?ServiceCategory $category = null;

    /**
     * @var Collection<int, ServiceTranslation>
     */
    #[ORM\OneToMany(targetEntity: ServiceTranslation::class, mappedBy: 'service', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $translations;

    /**
     * @var Collection<int, ServiceVariant>
     */
    #[ORM\OneToMany(targetEntity: ServiceVariant::class, mappedBy: 'service', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $variants;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->variants = new ArrayCollection();
    }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDurationMinutes(): int
    {
        return $this->durationMinutes;
    }

    public function setDurationMinutes(int $durationMinutes): static
    {
        $this->durationMinutes = $durationMinutes;

        return $this;
    }

    public function getBufferBeforeMinutes(): int
    {
        return $this->bufferBeforeMinutes;
    }

    public function setBufferBeforeMinutes(int $bufferBeforeMinutes): static
    {
        $this->bufferBeforeMinutes = $bufferBeforeMinutes;

        return $this;
    }

    public function getBufferAfterMinutes(): int
    {
        return $this->bufferAfterMinutes;
    }

    public function setBufferAfterMinutes(int $bufferAfterMinutes): static
    {
        $this->bufferAfterMinutes = $bufferAfterMinutes;

        return $this;
    }

    public function getPriceCents(): int
    {
        return $this->priceCents;
    }

    public function setPriceCents(int $priceCents): static
    {
        $this->priceCents = $priceCents;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPriceLabel(): string
    {
        return $this->priceLabel;
    }

    public function setPriceLabel(string $priceLabel): static
    {
        $this->priceLabel = $priceLabel;

        return $this;
    }

    public function isBookableOnline(): bool
    {
        return $this->isBookableOnline;
    }

    public function setIsBookableOnline(bool $isBookableOnline): static
    {
        $this->isBookableOnline = $isBookableOnline;

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

    public function isRequiresConfirmation(): bool
    {
        return $this->requiresConfirmation;
    }

    public function setRequiresConfirmation(bool $requiresConfirmation): static
    {
        $this->requiresConfirmation = $requiresConfirmation;

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

    public function getEstablishment(): ?Establishment
    {
        return $this->establishment;
    }

    public function setEstablishment(?Establishment $establishment): static
    {
        $this->establishment = $establishment;

        return $this;
    }

    public function getCategory(): ?ServiceCategory
    {
        return $this->category;
    }

    public function setCategory(?ServiceCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, ServiceTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    /**
     * @return Collection<int, ServiceVariant>
     */
    public function getVariants(): Collection
    {
        return $this->variants;
    }

}

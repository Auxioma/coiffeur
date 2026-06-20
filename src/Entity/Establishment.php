<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Entity\Traits\DeletedAtTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\EstablishmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstablishmentRepository::class)]
#[ORM\Table(name: 'establishment')]
#[ORM\Index(name: 'IDX_ESTABLISHMENT_STATUS', fields: ['status'])]
#[ORM\Index(name: 'IDX_ESTABLISHMENT_COUNTRY_ACTIVITY', fields: ['countryCode', 'activityType'])]
#[ORM\HasLifecycleCallbacks]
class Establishment
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    use DeletedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 26, unique: true, nullable: true)]
    private ?string $publicId = null;

    #[ORM\Column(length: 190)]
    private ?string $name = null;

    #[ORM\Column(length: 190)]
    private ?string $slug = null;

    #[ORM\Column(length: 40)]
    private string $activityType = 'coiffure';

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $websiteUrl = null;

    #[ORM\Column(length: 190)]
    private ?string $addressLine1 = null;

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $addressLine2 = null;

    #[ORM\Column(length: 32)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 120)]
    private ?string $city = null;

    #[ORM\Column(length: 2)]
    private string $countryCode = 'FR';

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7, nullable: true)]
    private ?string $latitude = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 7, nullable: true)]
    private ?string $longitude = null;

    #[ORM\Column(length: 40)]
    private string $status = 'draft';

    #[ORM\Column(length: 30)]
    private string $bookingMode = 'auto_confirm';

    #[ORM\Column(length: 30)]
    private string $paymentMode = 'on_site_only';

    #[ORM\Column(type: 'decimal', precision: 3, scale: 2, nullable: true)]
    private ?string $averageRating = null;

    #[ORM\Column]
    private int $reviewsCount = 0;

    #[ORM\Column(length: 64)]
    private string $timezone = 'UTC';

    #[ORM\ManyToOne(targetEntity: ProfessionalAccount::class, inversedBy: 'establishments')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?ProfessionalAccount $professionalAccount = null;

    /**
     * @var Collection<int, EstablishmentTranslation>
     */
    #[ORM\OneToMany(targetEntity: EstablishmentTranslation::class, mappedBy: 'establishment', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $translations;

    /**
     * @var Collection<int, EstablishmentMember>
     */
    #[ORM\OneToMany(targetEntity: EstablishmentMember::class, mappedBy: 'establishment')]
    private Collection $members;

    /**
     * @var Collection<int, Service>
     */
    #[ORM\OneToMany(targetEntity: Service::class, mappedBy: 'establishment')]
    private Collection $services;

    /**
     * @var Collection<int, Appointment>
     */
    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'establishment')]
    private Collection $appointments;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->members = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->appointments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicId(): ?string
    {
        return $this->publicId;
    }

    public function setPublicId(?string $publicId): static
    {
        $this->publicId = $publicId;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getActivityType(): string
    {
        return $this->activityType;
    }

    public function setActivityType(string $activityType): static
    {
        $this->activityType = $activityType;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?string $websiteUrl): static
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): static
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): static
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): static
    {
        $this->countryCode = strtoupper($countryCode);

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getBookingMode(): string
    {
        return $this->bookingMode;
    }

    public function setBookingMode(string $bookingMode): static
    {
        $this->bookingMode = $bookingMode;

        return $this;
    }

    public function getPaymentMode(): string
    {
        return $this->paymentMode;
    }

    public function setPaymentMode(string $paymentMode): static
    {
        $this->paymentMode = $paymentMode;

        return $this;
    }

    public function getAverageRating(): ?string
    {
        return $this->averageRating;
    }

    public function setAverageRating(?string $averageRating): static
    {
        $this->averageRating = $averageRating;

        return $this;
    }

    public function getReviewsCount(): int
    {
        return $this->reviewsCount;
    }

    public function setReviewsCount(int $reviewsCount): static
    {
        $this->reviewsCount = $reviewsCount;

        return $this;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): static
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getProfessionalAccount(): ?ProfessionalAccount
    {
        return $this->professionalAccount;
    }

    public function setProfessionalAccount(?ProfessionalAccount $professionalAccount): static
    {
        $this->professionalAccount = $professionalAccount;

        return $this;
    }

    /**
     * @return Collection<int, EstablishmentTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    /**
     * @return Collection<int, EstablishmentMember>
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointments(): Collection
    {
        return $this->appointments;
    }

}

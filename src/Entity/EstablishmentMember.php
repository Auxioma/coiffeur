<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\EstablishmentMemberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstablishmentMemberRepository::class)]
#[ORM\Table(name: 'establishment_member')]
#[ORM\HasLifecycleCallbacks]
class EstablishmentMember
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 160)]
    private ?string $displayName = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $jobTitle = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoPath = null;

    #[ORM\Column(length: 7, nullable: true)]
    private ?string $colorHex = null;

    #[ORM\Column]
    private bool $isBookableOnline = true;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $hiredAt = null;

    #[ORM\ManyToOne(targetEntity: Establishment::class, inversedBy: 'members')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'establishmentMembers')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: EstablishmentRole::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?EstablishmentRole $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): static
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): static
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getPhotoPath(): ?string
    {
        return $this->photoPath;
    }

    public function setPhotoPath(?string $photoPath): static
    {
        $this->photoPath = $photoPath;

        return $this;
    }

    public function getColorHex(): ?string
    {
        return $this->colorHex;
    }

    public function setColorHex(?string $colorHex): static
    {
        $this->colorHex = $colorHex;

        return $this;
    }

    public function isIsBookableOnline(): bool
    {
        return $this->isBookableOnline;
    }

    public function setIsBookableOnline(bool $isBookableOnline): static
    {
        $this->isBookableOnline = $isBookableOnline;

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

    public function getHiredAt(): ?\DateTimeInterface
    {
        return $this->hiredAt;
    }

    public function setHiredAt(?\DateTimeInterface $hiredAt): static
    {
        $this->hiredAt = $hiredAt;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getRole(): ?EstablishmentRole
    {
        return $this->role;
    }

    public function setRole(?EstablishmentRole $role): static
    {
        $this->role = $role;

        return $this;
    }

}

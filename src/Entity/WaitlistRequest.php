<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\WaitlistRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WaitlistRequestRepository::class)]
#[ORM\Table(name: 'waitlist_request')]
#[ORM\HasLifecycleCallbacks]
class WaitlistRequest
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $preferredDate = null;

    #[ORM\Column(length: 20)]
    private string $preferredPeriod = 'any';

    #[ORM\Column(length: 30)]
    private string $status = 'open';

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $note = null;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $client = null;

    #[ORM\ManyToOne(targetEntity: Service::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Service $service = null;

    #[ORM\ManyToOne(targetEntity: EstablishmentMember::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?EstablishmentMember $preferredMember = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPreferredDate(): ?\DateTimeInterface
    {
        return $this->preferredDate;
    }

    public function setPreferredDate(?\DateTimeInterface $preferredDate): static
    {
        $this->preferredDate = $preferredDate;

        return $this;
    }

    public function getPreferredPeriod(): string
    {
        return $this->preferredPeriod;
    }

    public function setPreferredPeriod(string $preferredPeriod): static
    {
        $this->preferredPeriod = $preferredPeriod;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

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

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getPreferredMember(): ?EstablishmentMember
    {
        return $this->preferredMember;
    }

    public function setPreferredMember(?EstablishmentMember $preferredMember): static
    {
        $this->preferredMember = $preferredMember;

        return $this;
    }

}

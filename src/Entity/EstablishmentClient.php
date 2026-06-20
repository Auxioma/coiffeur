<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\EstablishmentClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstablishmentClientRepository::class)]
#[ORM\Table(name: 'establishment_client')]
#[ORM\HasLifecycleCallbacks]
class EstablishmentClient
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private string $source = 'online';

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $internalNote = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $sensitiveNote = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $allergiesNote = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $colorFormulaNote = null;

    #[ORM\Column(type: 'json')]
    private array $tags = [];

    #[ORM\Column]
    private int $totalSpentCents = 0;

    #[ORM\Column]
    private int $appointmentsCount = 0;

    #[ORM\Column]
    private int $noShowCount = 0;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $lastVisitAt = null;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ?User $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getInternalNote(): ?string
    {
        return $this->internalNote;
    }

    public function setInternalNote(?string $internalNote): static
    {
        $this->internalNote = $internalNote;

        return $this;
    }

    public function getSensitiveNote(): ?string
    {
        return $this->sensitiveNote;
    }

    public function setSensitiveNote(?string $sensitiveNote): static
    {
        $this->sensitiveNote = $sensitiveNote;

        return $this;
    }

    public function getAllergiesNote(): ?string
    {
        return $this->allergiesNote;
    }

    public function setAllergiesNote(?string $allergiesNote): static
    {
        $this->allergiesNote = $allergiesNote;

        return $this;
    }

    public function getColorFormulaNote(): ?string
    {
        return $this->colorFormulaNote;
    }

    public function setColorFormulaNote(?string $colorFormulaNote): static
    {
        $this->colorFormulaNote = $colorFormulaNote;

        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getTotalSpentCents(): int
    {
        return $this->totalSpentCents;
    }

    public function setTotalSpentCents(int $totalSpentCents): static
    {
        $this->totalSpentCents = $totalSpentCents;

        return $this;
    }

    public function getAppointmentsCount(): int
    {
        return $this->appointmentsCount;
    }

    public function setAppointmentsCount(int $appointmentsCount): static
    {
        $this->appointmentsCount = $appointmentsCount;

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

    public function getLastVisitAt(): ?\DateTimeImmutable
    {
        return $this->lastVisitAt;
    }

    public function setLastVisitAt(?\DateTimeImmutable $lastVisitAt): static
    {
        $this->lastVisitAt = $lastVisitAt;

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

}

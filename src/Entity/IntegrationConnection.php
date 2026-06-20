<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\IntegrationConnectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntegrationConnectionRepository::class)]
#[ORM\Table(name: 'integration_connection')]
#[ORM\HasLifecycleCallbacks]
class IntegrationConnection
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $provider = null;

    #[ORM\Column(length: 30)]
    private string $status = 'connected';

    #[ORM\Column(length: 190, nullable: true)]
    private ?string $externalAccountId = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $accessTokenEncrypted = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $refreshTokenEncrypted = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $expiresAt = null;

    #[ORM\ManyToOne(targetEntity: Establishment::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Establishment $establishment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvider(): ?string
    {
        return $this->provider;
    }

    public function setProvider(?string $provider): static
    {
        $this->provider = $provider;

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

    public function getExternalAccountId(): ?string
    {
        return $this->externalAccountId;
    }

    public function setExternalAccountId(?string $externalAccountId): static
    {
        $this->externalAccountId = $externalAccountId;

        return $this;
    }

    public function getAccessTokenEncrypted(): ?string
    {
        return $this->accessTokenEncrypted;
    }

    public function setAccessTokenEncrypted(?string $accessTokenEncrypted): static
    {
        $this->accessTokenEncrypted = $accessTokenEncrypted;

        return $this;
    }

    public function getRefreshTokenEncrypted(): ?string
    {
        return $this->refreshTokenEncrypted;
    }

    public function setRefreshTokenEncrypted(?string $refreshTokenEncrypted): static
    {
        $this->refreshTokenEncrypted = $refreshTokenEncrypted;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(?\DateTimeImmutable $expiresAt): static
    {
        $this->expiresAt = $expiresAt;

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

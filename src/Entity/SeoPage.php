<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTraits;
use App\Entity\Traits\UpdatedAtTraits;
use App\Repository\SeoPageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeoPageRepository::class)]
#[ORM\Table(name: 'seo_page')]
#[ORM\HasLifecycleCallbacks]
class SeoPage
{
    use CreatedAtTraits;
    use UpdatedAtTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private string $pageType = 'category_city';

    #[ORM\Column(length: 10)]
    private string $locale = 'fr';

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $countryCode = null;

    #[ORM\Column(length: 190, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 190)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metaDescription = null;

    #[ORM\Column(length: 190)]
    private ?string $h1 = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $content = null;

    #[ORM\Column]
    private bool $isIndexable = true;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $publishedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPageType(): string
    {
        return $this->pageType;
    }

    public function setPageType(string $pageType): static
    {
        $this->pageType = $pageType;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): static
    {
        $this->countryCode = $countryCode;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): static
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    public function getH1(): ?string
    {
        return $this->h1;
    }

    public function setH1(?string $h1): static
    {
        $this->h1 = $h1;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function isIsIndexable(): bool
    {
        return $this->isIndexable;
    }

    public function setIsIndexable(bool $isIndexable): static
    {
        $this->isIndexable = $isIndexable;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

}

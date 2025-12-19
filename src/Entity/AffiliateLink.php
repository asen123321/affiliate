<?php

namespace App\Entity;

use App\Repository\AffiliateLinkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffiliateLinkRepository::class)]
#[ORM\Table(name: 'affiliate_link')]
#[ORM\Index(fields: ['originalUrl'], name: 'affiliate_link_original_url_idx')]
#[ORM\Index(fields: ['advertiserId', 'originalUrl'], name: 'affiliate_link_advertiser_url_idx')]
class AffiliateLink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $advertiserId = null;

    #[ORM\Column(length: 500)]
    private ?string $originalUrl = null;

    #[ORM\Column(length: 500)]
    private ?string $affiliateUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkName = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $lastUsedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->lastUsedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdvertiserId(): ?string
    {
        return $this->advertiserId;
    }

    public function setAdvertiserId(string $advertiserId): static
    {
        $this->advertiserId = $advertiserId;
        return $this;
    }

    public function getOriginalUrl(): ?string
    {
        return $this->originalUrl;
    }

    public function setOriginalUrl(string $originalUrl): static
    {
        $this->originalUrl = $originalUrl;
        return $this;
    }

    public function getAffiliateUrl(): ?string
    {
        return $this->affiliateUrl;
    }

    public function setAffiliateUrl(string $affiliateUrl): static
    {
        $this->affiliateUrl = $affiliateUrl;
        return $this;
    }

    public function getLinkName(): ?string
    {
        return $this->linkName;
    }

    public function setLinkName(?string $linkName): static
    {
        $this->linkName = $linkName;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getLastUsedAt(): ?\DateTimeImmutable
    {
        return $this->lastUsedAt;
    }

    public function setLastUsedAt(?\DateTimeImmutable $lastUsedAt): static
    {
        $this->lastUsedAt = $lastUsedAt;
        return $this;
    }
}

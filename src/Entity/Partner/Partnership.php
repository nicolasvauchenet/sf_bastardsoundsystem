<?php

namespace App\Entity\Partner;

use App\Repository\Partner\PartnershipRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnershipRepository::class)]
class Partnership
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $partnerType = null;

    #[ORM\Column(length: 255)]
    private ?string $partnerName = null;

    #[ORM\Column(length: 255)]
    private ?string $partnerEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $partnerPhone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $sentAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $acceptedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $rejectedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartnerType(): ?string
    {
        return $this->partnerType;
    }

    public function setPartnerType(?string $partnerType): static
    {
        $this->partnerType = $partnerType;

        return $this;
    }

    public function getPartnerName(): ?string
    {
        return $this->partnerName;
    }

    public function setPartnerName(string $partnerName): static
    {
        $this->partnerName = $partnerName;

        return $this;
    }

    public function getPartnerEmail(): ?string
    {
        return $this->partnerEmail;
    }

    public function setPartnerEmail(string $partnerEmail): static
    {
        $this->partnerEmail = $partnerEmail;

        return $this;
    }

    public function getPartnerPhone(): ?string
    {
        return $this->partnerPhone;
    }

    public function setPartnerPhone(?string $partnerPhone): static
    {
        $this->partnerPhone = $partnerPhone;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getSentAt(): ?\DateTimeImmutable
    {
        return $this->sentAt;
    }

    public function setSentAt(\DateTimeImmutable $sentAt): static
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    public function getAcceptedAt(): ?\DateTimeImmutable
    {
        return $this->acceptedAt;
    }

    public function setAcceptedAt(?\DateTimeImmutable $acceptedAt): static
    {
        $this->acceptedAt = $acceptedAt;

        return $this;
    }

    public function getRejectedAt(): ?\DateTimeImmutable
    {
        return $this->rejectedAt;
    }

    public function setRejectedAt(?\DateTimeImmutable $rejectedAt): static
    {
        $this->rejectedAt = $rejectedAt;

        return $this;
    }
}

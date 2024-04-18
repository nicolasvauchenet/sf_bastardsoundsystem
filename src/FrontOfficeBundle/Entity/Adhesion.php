<?php

namespace App\FrontOfficeBundle\Entity;

use App\FrontOfficeBundle\Repository\AdhesionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdhesionRepository::class)]
class Adhesion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adherentType = null;

    #[ORM\Column(length: 255)]
    private ?string $adherentName = null;

    #[ORM\Column(length: 255)]
    private ?string $adherentEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adherentPhone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $adherentMessage = null;

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

    public function getAdherentType(): ?string
    {
        return $this->adherentType;
    }

    public function setAdherentType(string $adherentType): static
    {
        $this->adherentType = $adherentType;

        return $this;
    }

    public function getAdherentName(): ?string
    {
        return $this->adherentName;
    }

    public function setAdherentName(string $adherentName): static
    {
        $this->adherentName = $adherentName;

        return $this;
    }

    public function getAdherentEmail(): ?string
    {
        return $this->adherentEmail;
    }

    public function setAdherentEmail(string $adherentEmail): static
    {
        $this->adherentEmail = $adherentEmail;

        return $this;
    }

    public function getAdherentPhone(): ?string
    {
        return $this->adherentPhone;
    }

    public function setAdherentPhone(?string $adherentPhone): static
    {
        $this->adherentPhone = $adherentPhone;

        return $this;
    }

    public function getAdherentMessage(): ?string
    {
        return $this->adherentMessage;
    }

    public function setAdherentMessage(?string $adherentMessage): static
    {
        $this->adherentMessage = $adherentMessage;

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

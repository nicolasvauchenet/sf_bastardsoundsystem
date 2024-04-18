<?php

namespace App\FrontOfficeBundle\Entity;

use App\FrontOfficeBundle\Repository\PartenariatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenariatRepository::class)]
class Partenariat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $partenaireType = null;

    #[ORM\Column(length: 255)]
    private ?string $partenaireName = null;

    #[ORM\Column(length: 255)]
    private ?string $partenaireEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $partenairePhone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $partenaireMessage = null;

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

    public function getPartenaireType(): ?string
    {
        return $this->partenaireType;
    }

    public function setPartenaireType(string $partenaireType): static
    {
        $this->partenaireType = $partenaireType;

        return $this;
    }

    public function getPartenaireName(): ?string
    {
        return $this->partenaireName;
    }

    public function setPartenaireName(string $partenaireName): static
    {
        $this->partenaireName = $partenaireName;

        return $this;
    }

    public function getPartenaireEmail(): ?string
    {
        return $this->partenaireEmail;
    }

    public function setPartenaireEmail(string $partenaireEmail): static
    {
        $this->partenaireEmail = $partenaireEmail;

        return $this;
    }

    public function getPartenairePhone(): ?string
    {
        return $this->partenairePhone;
    }

    public function setPartenairePhone(?string $partenairePhone): static
    {
        $this->partenairePhone = $partenairePhone;

        return $this;
    }

    public function getPartenaireMessage(): ?string
    {
        return $this->partenaireMessage;
    }

    public function setPartenaireMessage(?string $partenaireMessage): static
    {
        $this->partenaireMessage = $partenaireMessage;

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

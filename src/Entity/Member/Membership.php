<?php

namespace App\Entity\Member;

use App\Repository\Member\MembershipRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembershipRepository::class)]
class Membership
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $memberType = null;

    #[ORM\Column(length: 255)]
    private ?string $memberName = null;

    #[ORM\Column(length: 255)]
    private ?string $memberEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $memberPhone = null;

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

    public function getMemberType(): ?string
    {
        return $this->memberType;
    }

    public function setMemberType(?string $memberType): static
    {
        $this->memberType = $memberType;

        return $this;
    }

    public function getMemberName(): ?string
    {
        return $this->memberName;
    }

    public function setMemberName(string $memberName): static
    {
        $this->memberName = $memberName;

        return $this;
    }

    public function getMemberEmail(): ?string
    {
        return $this->memberEmail;
    }

    public function setMemberEmail(string $memberEmail): static
    {
        $this->memberEmail = $memberEmail;

        return $this;
    }

    public function getMemberPhone(): ?string
    {
        return $this->memberPhone;
    }

    public function setMemberPhone(?string $memberPhone): static
    {
        $this->memberPhone = $memberPhone;

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

<?php

namespace App\AdminBundle\Entity;

use App\AdherentBundle\Entity\Adherent;
use App\AdminBundle\Repository\CotisationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CotisationRepository::class)]
class Cotisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $paidAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $nextAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $reminded = null;

    #[ORM\ManyToOne(inversedBy: 'cotisations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adherent $adherent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPaidAt(): ?\DateTimeImmutable
    {
        return $this->paidAt;
    }

    public function setPaidAt(?\DateTimeImmutable $paidAt): static
    {
        $this->paidAt = $paidAt;

        return $this;
    }

    public function getNextAt(): ?\DateTimeImmutable
    {
        return $this->nextAt;
    }

    public function setNextAt(?\DateTimeImmutable $nextAt): static
    {
        $this->nextAt = $nextAt;

        return $this;
    }

    public function getReminded(): ?int
    {
        return $this->reminded;
    }

    public function setReminded(?int $reminded): static
    {
        $this->reminded = $reminded;

        return $this;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?Adherent $adherent): static
    {
        $this->adherent = $adherent;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\PartnerOccupationSpecialtyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnerOccupationSpecialtyRepository::class)]
class PartnerOccupationSpecialty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'partnerOccupationSpecialties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Partner $partner = null;

    #[ORM\ManyToOne(inversedBy: 'partnerOccupationSpecialties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Occupation $occupation = null;

    #[ORM\ManyToOne(inversedBy: 'partnerOccupationSpecialties')]
    private ?Specialty $specialty = null;

    #[ORM\Column]
    private ?bool $active = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): static
    {
        $this->partner = $partner;

        return $this;
    }

    public function getOccupation(): ?Occupation
    {
        return $this->occupation;
    }

    public function setOccupation(?Occupation $occupation): static
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }

    public function setSpecialty(?Specialty $specialty): static
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }
}

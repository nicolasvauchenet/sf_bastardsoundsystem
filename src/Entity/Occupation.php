<?php

namespace App\Entity;

use App\Repository\OccupationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: OccupationRepository::class)]
class Occupation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icon = null;

    #[ORM\Column(length: 255)]
    private ?string $active = null;

    /**
     * @var Collection<int, PartnerOccupationSpecialty>
     */
    #[ORM\OneToMany(targetEntity: PartnerOccupationSpecialty::class, mappedBy: 'occupation', orphanRemoval: true)]
    private Collection $partnerOccupationSpecialties;

    public function __construct()
    {
        $this->partnerOccupationSpecialties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getActive(): ?string
    {
        return $this->active;
    }

    public function setActive(string $active): static
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, PartnerOccupationSpecialty>
     */
    public function getPartnerOccupationSpecialties(): Collection
    {
        return $this->partnerOccupationSpecialties;
    }

    public function addPartnerOccupationSpecialty(PartnerOccupationSpecialty $partnerOccupationSpecialty): static
    {
        if (!$this->partnerOccupationSpecialties->contains($partnerOccupationSpecialty)) {
            $this->partnerOccupationSpecialties->add($partnerOccupationSpecialty);
            $partnerOccupationSpecialty->setOccupation($this);
        }

        return $this;
    }

    public function removePartnerOccupationSpecialty(PartnerOccupationSpecialty $partnerOccupationSpecialty): static
    {
        if ($this->partnerOccupationSpecialties->removeElement($partnerOccupationSpecialty)) {
            // set the owning side to null (unless already changed)
            if ($partnerOccupationSpecialty->getOccupation() === $this) {
                $partnerOccupationSpecialty->setOccupation(null);
            }
        }

        return $this;
    }
}

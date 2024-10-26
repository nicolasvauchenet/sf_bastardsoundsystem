<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
class Partner extends Member
{
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoLive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoTeam = null;

    /**
     * @var Collection<int, Specialty>
     */
    #[ORM\ManyToMany(targetEntity: Specialty::class, mappedBy: 'partners')]
    private Collection $specialties;

    public function __construct()
    {
        parent::__construct();
        $this->specialties = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getPhotoLive(): ?string
    {
        return $this->photoLive;
    }

    public function setPhotoLive(?string $photoLive): static
    {
        $this->photoLive = $photoLive;

        return $this;
    }

    public function getPhotoTeam(): ?string
    {
        return $this->photoTeam;
    }

    public function setPhotoTeam(?string $photoTeam): static
    {
        $this->photoTeam = $photoTeam;

        return $this;
    }

    /**
     * @return Collection<int, Specialty>
     */
    public function getSpecialties(): Collection
    {
        return $this->specialties;
    }

    public function addSpecialties(Specialty $specialties): static
    {
        if(!$this->specialties->contains($specialties)) {
            $this->specialties->add($specialties);
            $specialties->addPartner($this);
        }

        return $this;
    }

    public function removeSpecialties(Specialty $specialties): static
    {
        if($this->specialties->removeElement($specialties)) {
            $specialties->removePartner($this);
        }

        return $this;
    }
}

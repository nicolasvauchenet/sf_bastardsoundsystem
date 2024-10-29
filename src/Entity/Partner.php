<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'discriminator', type: 'string')]
#[ORM\DiscriminatorMap(['partner' => 'App\Entity\Partner', 'promoter' => 'App\Entity\Promoter'])]
class Partner extends Member
{
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoLive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoTeam = null;

    /**
     * @var Collection<int, PartnerOccupationSpecialty>
     */
    #[ORM\OneToMany(targetEntity: PartnerOccupationSpecialty::class, mappedBy: 'partner', orphanRemoval: true)]
    private Collection $partnerOccupationSpecialties;

    public function __construct()
    {
        parent::__construct();
        $this->partnerOccupationSpecialties = new ArrayCollection();
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
     * @return Collection<int, PartnerOccupationSpecialty>
     */
    public function getPartnerOccupationSpecialties(): Collection
    {
        return $this->partnerOccupationSpecialties;
    }

    public function addPartnerOccupationSpecialty(PartnerOccupationSpecialty $partnerOccupationSpecialty): static
    {
        if(!$this->partnerOccupationSpecialties->contains($partnerOccupationSpecialty)) {
            $this->partnerOccupationSpecialties->add($partnerOccupationSpecialty);
            $partnerOccupationSpecialty->setPartner($this);
        }

        return $this;
    }

    public function removePartnerOccupationSpecialty(PartnerOccupationSpecialty $partnerOccupationSpecialty): static
    {
        if($this->partnerOccupationSpecialties->removeElement($partnerOccupationSpecialty)) {
            // set the owning side to null (unless already changed)
            if($partnerOccupationSpecialty->getPartner() === $this) {
                $partnerOccupationSpecialty->setPartner(null);
            }
        }

        return $this;
    }
}

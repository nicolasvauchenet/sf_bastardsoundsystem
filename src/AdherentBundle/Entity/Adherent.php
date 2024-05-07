<?php

namespace App\AdherentBundle\Entity;

use App\AdminBundle\Entity\Cotisation;
use App\AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Adherent extends User
{
    #[ORM\Column(type: "string", length: 255)]
    private ?string $adherentType = null;

    /**
     * @var Collection<int, Cotisation>
     */
    #[ORM\OneToMany(targetEntity: Cotisation::class, mappedBy: 'adherent', orphanRemoval: true)]
    private Collection $cotisations;

    public function __construct()
    {
        $this->cotisations = new ArrayCollection();
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

    /**
     * @return Collection<int, Cotisation>
     */
    public function getCotisations(): Collection
    {
        return $this->cotisations;
    }

    public function addCotisation(Cotisation $cotisation): static
    {
        if(!$this->cotisations->contains($cotisation)) {
            $this->cotisations->add($cotisation);
            $cotisation->setAdherent($this);
        }

        return $this;
    }

    public function removeCotisation(Cotisation $cotisation): static
    {
        if($this->cotisations->removeElement($cotisation)) {
            // set the owning side to null (unless already changed)
            if($cotisation->getAdherent() === $this) {
                $cotisation->setAdherent(null);
            }
        }

        return $this;
    }

    public function isUpToDate(): bool
    {
        $reminds = 0;
        foreach($this->getCotisations() as $cotisation) {
            if($cotisation->getReminded() > 0) {
                $reminds++;
            }
        }

        return !($reminds > 0);
    }

    public function getLastCotisation()
    {
        return $this->cotisations->last();
    }
}

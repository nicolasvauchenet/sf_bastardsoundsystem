<?php

namespace App\AdherentBundle\Entity;

use App\AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Adherent extends User
{
    #[ORM\Column(type: "string", length: 255)]
    private string $adherentType;

    public function getAdherentType(): string
    {
        return $this->adherentType;
    }

    public function setAdherentType(string $adherentType): self
    {
        $this->adherentType = $adherentType;

        return $this;
    }
}
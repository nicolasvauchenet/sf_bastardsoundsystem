<?php

namespace App\PartenaireBundle\Entity;

use App\AppBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Partenaire extends User
{
    #[ORM\Column(type: "string", length: 255)]
    private string $partenaireType;

    #[ORM\Column(type: "string", length: 255)]
    private string $companyName;

    public function getPartenaireType(): string
    {
        return $this->partenaireType;
    }

    public function setPartenaireType(string $partenaireType): self
    {
        $this->partenaireType = $partenaireType;

        return $this;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }
}

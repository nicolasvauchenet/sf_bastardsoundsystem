<?php

namespace App\AppBundle\Service;

use App\AppBundle\Entity\Informations;
use App\AppBundle\Repository\InformationsRepository;

class InformationsService
{
    private Informations $informations;

    public function __construct(InformationsRepository $informationsRepository)
    {
        $this->informations = $informationsRepository->find(1);
    }

    public function getAssociationName(): ?string
    {
        return $this->informations->getName();
    }

    public function getAssociationEmail(): ?string
    {
        return $this->informations->getEmail();
    }

    public function getAssociationPhone(): ?string
    {
        return $this->informations->getPhone();
    }

    public function getAssociationAddress(): ?string
    {
        return $this->informations->getAddress();
    }
}

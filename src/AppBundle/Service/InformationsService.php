<?php

namespace App\AppBundle\Service;

use App\AppBundle\Entity\Informations;
use App\AppBundle\Repository\InformationsRepository;

class InformationsService
{
    private ?Informations $informations = null;
    private InformationsRepository $informationsRepository;

    public function __construct(InformationsRepository $informationsRepository)
    {
        $this->informationsRepository = $informationsRepository;
    }

    private function loadInformations(): void
    {
        if($this->informations === null) {
            $this->informations = $this->informationsRepository->find(1);
        }
    }

    public function getAssociationName(): ?string
    {
        $this->loadInformations();

        return $this->informations?->getName();
    }

    public function getAssociationEmail(): ?string
    {
        $this->loadInformations();

        return $this->informations?->getEmail();
    }

    public function getAssociationPhone(): ?string
    {
        $this->loadInformations();

        return $this->informations?->getPhone();
    }

    public function getAssociationAddress(): ?string
    {
        $this->loadInformations();

        return $this->informations?->getAddress();
    }

    public function getCotisationAmount(): ?int
    {
        $this->loadInformations();

        return $this->informations?->getCotisationAmount();
    }
}

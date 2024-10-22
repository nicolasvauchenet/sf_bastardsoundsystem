<?php

namespace App\Service;

use App\Repository\PartnerRepository;

class PartnerService
{
    private PartnerRepository $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function getAllPartners(): array
    {
        return $this->partnerRepository->findBy(['active' => true], ['name' => 'ASC']);
    }

    public function getSpecialties(): array
    {
        return $this->partnerRepository->findAllSpecialties();
    }

    public function getDepartments(): array
    {
        return $this->partnerRepository->findAllDepartments();
    }

    public function getCities(): array
    {
        return $this->partnerRepository->findAllCities();
    }
}

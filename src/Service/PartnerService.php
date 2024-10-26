<?php

namespace App\Service;

use App\Repository\PartnerRepository;
use App\Repository\SpecialtyRepository;

class PartnerService
{
    private PartnerRepository $partnerRepository;
    private SpecialtyRepository $specialtyRepository;

    public function __construct(PartnerRepository $partnerRepository, SpecialtyRepository $specialtyRepository)
    {
        $this->partnerRepository = $partnerRepository;
        $this->specialtyRepository = $specialtyRepository;
    }

    public function getAllPartners(): array
    {
        return $this->partnerRepository->findBy(['active' => true], ['name' => 'ASC']);
    }

    public function getSpecialties(): array
    {
        return $this->specialtyRepository->findWithPartners();
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

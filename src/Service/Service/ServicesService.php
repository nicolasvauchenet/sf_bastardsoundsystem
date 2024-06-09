<?php

namespace App\Service\Service;

use App\Repository\Service\ServiceRepository;

class ServicesService
{
    private ServiceRepository $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function getServices()
    {
        return $this->serviceRepository->findBy([], ['id' => 'ASC']);
    }

    public function getServicesByCategory(string $category)
    {
        return $this->serviceRepository->findBy(['category' => $category], ['id' => 'ASC']);
    }
}

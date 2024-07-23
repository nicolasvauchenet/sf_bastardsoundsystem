<?php

namespace App\Service\Service;

use App\Repository\Service\CategoryRepository;
use App\Repository\Service\ServiceRepository;

class ServicesService
{
    private ServiceRepository $serviceRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(ServiceRepository $serviceRepository, CategoryRepository $categoryRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getServices()
    {
        return $this->serviceRepository->findBy([], ['id' => 'ASC']);
    }

    public function getCategories()
    {
        return $this->categoryRepository->findBy([], ['position' => 'ASC']);
    }
}

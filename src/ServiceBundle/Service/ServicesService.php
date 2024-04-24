<?php

namespace App\ServiceBundle\Service;

use App\ServiceBundle\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class ServicesService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFirstCategories(string $type): array
    {
        return $this->entityManager->getRepository(Category::class)->findBy(['type' => $type, 'parent' => null], ['id' => 'ASC']);
    }
}

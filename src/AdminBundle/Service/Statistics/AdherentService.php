<?php

namespace App\AdminBundle\Service\Statistics;

use App\AdherentBundle\Entity\Adherent;
use Doctrine\ORM\EntityManagerInterface;

class AdherentService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAdherents(): array
    {
        return $this->entityManager->getRepository(Adherent::class)->findAll();
    }
}

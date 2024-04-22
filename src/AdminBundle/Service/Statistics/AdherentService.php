<?php

namespace App\AdminBundle\Service\Statistics;

use App\AdherentBundle\Entity\Adherent;
use App\AppBundle\Entity\User;
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
        return $this->entityManager->getRepository(Adherent::class)->findBy(['archivedAt' => null], ['adherentType' => 'ASC', 'createdAt' => 'DESC']);
    }

    public function getArchivedAdherents(): array
    {
        return $this->entityManager->getRepository(User::class)->findArchivedUsers('adherent');
    }
}

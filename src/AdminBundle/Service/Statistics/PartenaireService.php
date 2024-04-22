<?php

namespace App\AdminBundle\Service\Statistics;

use App\AppBundle\Entity\User;
use App\PartenaireBundle\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;

class PartenaireService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPartenaires(): array
    {
        return $this->entityManager->getRepository(Partenaire::class)->findBy(['archivedAt' => null], ['partenaireType' => 'ASC', 'createdAt' => 'DESC']);
    }

    public function getArchivedPartenaires(): array
    {
        return $this->entityManager->getRepository(User::class)->findArchivedUsers('partenaire');
    }
}

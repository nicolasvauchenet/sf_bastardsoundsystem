<?php

namespace App\Repository;

use App\Entity\Specialty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specialty>
 */
class SpecialtyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialty::class);
    }

    public function findWithPartners(): array
    {
        $qb = $this->createQueryBuilder('s')
            ->leftJoin('s.partnerOccupationSpecialties', 'pos')
            ->where('pos.id IS NOT NULL')
            ->groupBy('s.id')
            ->having('COUNT(pos.id) > 0')
            ->orderBy('s.name', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

<?php

namespace App\Repository;

use App\Entity\Occupation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Occupation>
 */
class OccupationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Occupation::class);
    }

    public function findWithPartners(): array
    {
        $qb = $this->createQueryBuilder('o')
            ->leftJoin('o.partnerOccupationSpecialties', 'pos')
            ->where('pos.id IS NOT NULL')
            ->groupBy('o.id')
            ->having('COUNT(pos.id) > 0')
            ->orderBy('o.name', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

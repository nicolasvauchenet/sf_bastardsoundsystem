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
            ->leftJoin('s.partners', 'p')
            ->where('p.id IS NOT NULL')
            ->groupBy('s.id')
            ->having('COUNT(p.id) > 0')
            ->orderBy('s.name', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

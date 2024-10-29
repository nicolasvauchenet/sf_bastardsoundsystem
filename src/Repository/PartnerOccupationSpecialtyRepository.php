<?php

namespace App\Repository;

use App\Entity\PartnerOccupationSpecialty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PartnerOccupationSpecialty>
 */
class PartnerOccupationSpecialtyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartnerOccupationSpecialty::class);
    }

    public function findSpecialtiesByOccupation(string $occupationId): array
    {
        $qb = $this->createQueryBuilder('pos')
            ->select('DISTINCT s.id, s.name')
            ->leftJoin('pos.specialty', 's')
            ->leftJoin('pos.occupation', 'o')
            ->andWhere('o.id = :occupationId')
            ->andWhere('pos.active = true')
            ->setParameter('occupationId', $occupationId)
            ->orderBy('s.name', 'ASC');

        return $qb->getQuery()->getArrayResult();
    }

    public function findAllSpecialties(): array
    {
        $qb = $this->createQueryBuilder('pos')
            ->select('DISTINCT s.id, s.name')
            ->leftJoin('pos.specialty', 's')
            ->andWhere('pos.active = true')
            ->orderBy('s.name', 'ASC');

        return $qb->getQuery()->getArrayResult();
    }
}

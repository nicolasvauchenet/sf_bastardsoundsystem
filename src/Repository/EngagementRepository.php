<?php

namespace App\Repository;

use App\Entity\Engagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Engagement>
 */
class EngagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Engagement::class);
    }

    public function findByFilters(?string $status = null): array
    {
        $qb = $this->createQueryBuilder('e');

        if($status) {
            $qb->andWhere('LOWER(e.status) = LOWER(:status)')
                ->setParameter('status', $status);
        }

        $qb->orderBy('e.sentAt', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

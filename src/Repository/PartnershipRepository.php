<?php

namespace App\Repository;

use App\Entity\Partnership;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partnership>
 */
class PartnershipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partnership::class);
    }

    public function findByFilters(?string $status = null): array
    {
        $qb = $this->createQueryBuilder('p');

        if($status) {
            $qb->andWhere('LOWER(p.status) = LOWER(:status)')
                ->setParameter('status', $status);
        }

        $qb->orderBy('p.sentAt', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

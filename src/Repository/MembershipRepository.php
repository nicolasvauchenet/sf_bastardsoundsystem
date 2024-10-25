<?php

namespace App\Repository;

use App\Entity\Membership;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Membership>
 */
class MembershipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Membership::class);
    }

    public function findByFilters(?string $status = null): array
    {
        $qb = $this->createQueryBuilder('m');

        if($status) {
            $qb->andWhere('LOWER(m.status) = LOWER(:status)')
                ->setParameter('status', $status);
        }

        $qb->orderBy('m.sentAt', 'DESC');

        return $qb->getQuery()->getResult();
    }
}

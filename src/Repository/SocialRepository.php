<?php

namespace App\Repository;

use App\Entity\Social;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Social>
 */
class SocialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Social::class);
    }

    public function findByUser(string $slug): array
    {
        return $this->createQueryBuilder('s')
            ->join('s.owner', 'o')
            ->andWhere('o.slug = :val')
            ->andWhere('s.active = true')
            ->setParameter('val', $slug)
            ->orderBy('s.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}

<?php

namespace App\FrontOfficeBundle\Repository;

use App\FrontOfficeBundle\Entity\Partenariat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partenariat>
 *
 * @method Partenariat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partenariat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partenariat[]    findAll()
 * @method Partenariat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartenariatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partenariat::class);
    }

    public function findNewPartenariats(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.acceptedAt IS NULL')
            ->andWhere('p.rejectedAt IS NULL')
            ->orderBy('p.sentAt', 'DESC')
            ->addOrderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findRejectedPartenariats(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.rejectedAt IS NOT NULL')
            ->orderBy('p.sentAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}

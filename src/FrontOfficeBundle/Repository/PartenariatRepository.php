<?php

namespace App\FrontOfficeBundle\Repository;

use App\FrontOfficeBundle\Entity\Partenariat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
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

    public function findNewPartenariats(): ArrayCollection
    {
        $result = $this->createQueryBuilder('p')
            ->andWhere('p.acceptedAt IS NULL')
            ->andWhere('p.rejectedAt IS NULL')
            ->getQuery()
            ->getResult();

        return new ArrayCollection($result);
    }
}

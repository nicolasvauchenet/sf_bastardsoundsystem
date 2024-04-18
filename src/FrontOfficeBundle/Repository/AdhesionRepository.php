<?php

namespace App\FrontOfficeBundle\Repository;

use App\FrontOfficeBundle\Entity\Adhesion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Adhesion>
 *
 * @method Adhesion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adhesion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adhesion[]    findAll()
 * @method Adhesion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdhesionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adhesion::class);
    }

    public function findNewAdhesions(): ArrayCollection
    {
        $result = $this->createQueryBuilder('a')
            ->andWhere('a.acceptedAt IS NULL')
            ->andWhere('a.rejectedAt IS NULL')
            ->getQuery()
            ->getResult();

        return new ArrayCollection($result);
    }
}

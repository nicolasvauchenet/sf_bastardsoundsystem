<?php

namespace App\AdminBundle\Repository;

use App\AdminBundle\Entity\Cotisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cotisation>
 *
 * @method Cotisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cotisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cotisation[]    findAll()
 * @method Cotisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CotisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cotisation::class);
    }

    /**
     * @return Cotisation[] Returns an array of Cotisation objects
     */
    public function findAllByStatus(string $status): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.adherent', 'ca')
            ->andWhere('c.status = :val')
            ->andWhere('ca.archivedAt IS NULL')
            ->setParameter('val', $status)
            ->orderBy('c.nextAt', 'ASC')
            ->getQuery()
            ->getResult();
    }
}

<?php

namespace App\DocumentBundle\Repository;

use App\DocumentBundle\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 *
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @return Category[] Returns an array of Category objects
     */
    public function findNonOfficials(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.name != :val')
            ->setParameter('val', 'Officiel')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}

<?php

namespace App\Repository;

use App\Entity\Partner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partner>
 */
class PartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partner::class);
    }

    public function findAllDepartments(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('DISTINCT SUBSTRING(p.zipcode, 1, 2) AS department')
            ->orderBy('department', 'ASC');

        $results = $qb->getQuery()->getResult();

        return array_column($results, 'department');
    }

    public function findAllCities(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('DISTINCT p.city')
            ->orderBy('p.city', 'ASC');

        $results = $qb->getQuery()->getResult();

        return array_column($results, 'city');
    }

    public function findByFilters(?string $specialty = null, ?string $occupation = null, ?string $department = null, ?string $city = null): array
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.partnerOccupationSpecialties', 'pos')
            ->leftJoin('pos.specialty', 's')
            ->leftJoin('pos.occupation', 'o')
            ->addSelect('pos', 's', 'o');

        if($specialty) {
            $qb->andWhere('s.id = :specialty')
                ->setParameter('specialty', $specialty);
        }

        if($occupation) {
            $qb->andWhere('o.id = :occupation')
                ->setParameter('occupation', $occupation);
        }

        if($department) {
            $qb->andWhere('SUBSTRING(p.zipcode, 1, 2) = :department')
                ->setParameter('department', $department);
        }

        if($city) {
            $qb->andWhere('LOWER(p.city) = LOWER(:city)')
                ->setParameter('city', $city);
        }

        $qb->andWhere('p.active = true')
            ->orderBy('p.id', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

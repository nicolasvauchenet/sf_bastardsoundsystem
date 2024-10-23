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

    public function findAllSpecialties(): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('DISTINCT p.specialties')
            ->orderBy('p.specialties', 'ASC');

        $results = $qb->getQuery()->getResult();

        $activities = [];
        foreach($results as $result) {
            $specialties = explode(',', $result['specialties']);
            foreach($specialties as $specialty) {
                $activity = trim($specialty);
                if(!in_array($activity, $activities)) {
                    $activities[] = $activity;
                }
            }
        }

        sort($activities);

        return $activities;
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

    public function findByFilters(?string $specialties = null, ?string $department = null, ?string $city = null): array
    {
        $qb = $this->createQueryBuilder('p');

        if($specialties) {
            $qb->andWhere('LOWER(p.specialties) LIKE LOWER(:specialties)')
                ->setParameter('specialties', '%' . $specialties . '%');
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
            ->orderBy('p.name', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

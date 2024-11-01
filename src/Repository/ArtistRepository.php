<?php

namespace App\Repository;

use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artist>
 */
class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }

    public function findAllGenres(): array
    {
        $qb = $this->createQueryBuilder('a')
            ->select('DISTINCT a.genre')
            ->orderBy('a.genre', 'ASC');

        $results = $qb->getQuery()->getResult();

        return array_column($results, 'genre');
    }

    public function findAllDepartments(): array
    {
        $qb = $this->createQueryBuilder('a')
            ->select('DISTINCT SUBSTRING(a.zipcode, 1, 2) AS department')
            ->orderBy('department', 'ASC');

        $results = $qb->getQuery()->getResult();

        return array_column($results, 'department');
    }

    public function findAllCities(): array
    {
        $qb = $this->createQueryBuilder('a')
            ->select('DISTINCT a.city')
            ->orderBy('a.city', 'ASC');

        $results = $qb->getQuery()->getResult();

        return array_column($results, 'city');
    }

    public function findAllBandmates(): array
    {
        $qb = $this->createQueryBuilder('a')
            ->select('DISTINCT a.bandmates')
            ->orderBy('a.bandmates', 'ASC');

        $results = $qb->getQuery()->getResult();

        return array_column($results, 'bandmates');
    }

    public function findByFilters(?string $genre = null, ?string $department = null, ?string $city = null, ?int $bandmates = null): array
    {
        $qb = $this->createQueryBuilder('a');

        if($genre) {
            $qb->andWhere('LOWER(a.genre) = LOWER(:genre)')
                ->setParameter('genre', $genre);
        }

        if($department) {
            $qb->andWhere('SUBSTRING(a.zipcode, 1, 2) = :department')
                ->setParameter('department', $department);
        }

        if($city) {
            $qb->andWhere('LOWER(a.city) = LOWER(:city)')
                ->setParameter('city', $city);
        }

        if($bandmates) {
            $qb->andWhere('a.bandmates = :bandmates')
                ->setParameter('bandmates', $bandmates);
        }

        $qb->andWhere('a.active = true')
            ->orderBy('a.name', 'ASC');

        return $qb->getQuery()->getResult();
    }
}

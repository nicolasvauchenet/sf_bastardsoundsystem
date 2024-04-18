<?php

namespace App\FrontOfficeBundle\Repository;

use App\FrontOfficeBundle\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contact>
 *
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function findNewMessages(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.answeredAt IS NULL')
            ->andWhere('c.senderType != :type')
            ->setParameter('type', 'reply')
            ->orderBy('c.sentAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAnsweredMessages(): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.answeredAt IS NOT NULL')
            ->orderBy('c.sentAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}

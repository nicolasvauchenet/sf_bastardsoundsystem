<?php

namespace App\AdminBundle\Service\Statistics;

use App\FrontOfficeBundle\Entity\Adhesion;
use App\FrontOfficeBundle\Entity\Contact;
use App\FrontOfficeBundle\Entity\Partenariat;
use Doctrine\ORM\EntityManagerInterface;

class ContactService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getTotalAdhesions()
    {
        return $this->entityManager->getRepository(Adhesion::class)->findNewAdhesions()->count();
    }

    public function getTotalPartenariats()
    {
        return $this->entityManager->getRepository(Partenariat::class)->findNewPartenariats()->count();
    }

    public function getTotalMessages()
    {
        return $this->entityManager->getRepository(Contact::class)->findNewMessages()->count();
    }
}

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

    public function getAdhesions(): array
    {
        return $this->entityManager->getRepository(Adhesion::class)->findNewAdhesions();
    }

    public function getPartenariats(): array
    {
        return $this->entityManager->getRepository(Partenariat::class)->findNewPartenariats();
    }

    public function getMessages(): array
    {
        return $this->entityManager->getRepository(Contact::class)->findNewMessages();
    }
}

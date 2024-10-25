<?php

namespace App\Controller\BackOffice\Contacts\Membership;

use App\Entity\Membership;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/adhesions', name: 'app_back_office_contacts_membership_')]
class ArchiveController extends AbstractController
{
    #[Route('/refuser/{id}', name: 'archive')]
    public function archive(EntityManagerInterface $entityManager,
                            Membership             $membership): Response
    {
        $membership->setStatus('Archive');
        $entityManager->persist($membership);
        $entityManager->flush();

        $this->addFlash('danger', "Tu as refusé la demande d'adhésion de {$membership->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_membership_home', ['etat' => 'archive'], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\Controller\BackOffice\Contacts\Membership;

use App\Entity\Membership;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/adhesions', name: 'app_back_office_contacts_membership_')]
class WaitController extends AbstractController
{
    #[Route('/mettre-en-attente/{id}', name: 'wait')]
    public function wait(EntityManagerInterface $entityManager,
                         Membership             $membership): Response
    {
        $membership->setStatus('Attente');
        $entityManager->persist($membership);
        $entityManager->flush();

        $this->addFlash('warning', "Tu as mis la demande d'adhésion de {$membership->getName()} en attente&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_membership_home', ['etat' => 'attente'], Response::HTTP_SEE_OTHER);
    }
}

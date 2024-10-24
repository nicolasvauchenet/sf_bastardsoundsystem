<?php

namespace App\Controller\BackOffice\Contacts\Message;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administrations/contacts/messages', name: 'app_back_office_contacts_message_')]
class WaitController extends AbstractController
{
    #[Route('/mettre-en-attente/{id}', name: 'wait')]
    public function wait(EntityManagerInterface $entityManager,
                         Message                $message): Response
    {
        $message->setStatus('Attente');
        $entityManager->persist($message);
        $entityManager->flush();

        $this->addFlash('warning', "Tu as mis le message de {$message->getSenderName()} en attente&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_message_home', ['etat' => 'attente'], Response::HTTP_SEE_OTHER);
    }
}

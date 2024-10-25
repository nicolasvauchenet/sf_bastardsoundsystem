<?php

namespace App\Controller\BackOffice\Contacts\Message;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/messages', name: 'app_back_office_contacts_message_')]
class AnswerController extends AbstractController
{
    #[Route('/repondre/{id}', name: 'answer')]
    public function answer(EntityManagerInterface $entityManager,
                           Message                $message): Response
    {
        $message
            ->setAnsweredAt(new \DateTimeImmutable())
            ->setStatus('Archive');
        $entityManager->persist($message);
        $entityManager->flush();

        $this->addFlash('success', "Tu as marqué le message de {$message->getSenderName()} comme répondu&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_message_home', ['etat' => 'nouveau'], Response::HTTP_SEE_OTHER);
    }
}

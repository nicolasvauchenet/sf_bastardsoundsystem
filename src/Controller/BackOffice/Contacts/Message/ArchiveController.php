<?php

namespace App\Controller\BackOffice\Contacts\Message;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/messages', name: 'app_back_office_contacts_message_')]
class ArchiveController extends AbstractController
{
    #[Route('/archiver/{id}', name: 'archive')]
    public function archive(EntityManagerInterface $entityManager,
                            Message                $message): Response
    {
        $message->setStatus('Archive');
        $entityManager->persist($message);
        $entityManager->flush();

        $this->addFlash('danger', "Tu as archivé le message de {$message->getSenderName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_message_home', ['etat' => 'archive'], Response::HTTP_SEE_OTHER);
    }
}

<?php

namespace App\AdminBundle\Controller\Contact\Messages;

use App\AppBundle\Service\InformationsService;
use App\AppBundle\Service\MailerService;
use App\FrontOfficeBundle\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/messages', name: 'admin_contact_messages_')]
class ReplyController extends AbstractController
{
    #[Route('/repondre/{id}', name: 'reply')]
    public function reply(Request                $request,
                          MailerService          $mailerService,
                          EntityManagerInterface $entityManager,
                          InformationsService    $informationsService,
                          Contact                $contact): Response
    {
        $mailerService->sendEmail([
            'from' => [
                'type' => 'reply',
                'name' => $informationsService->getAssociationName(),
                'email' => $informationsService->getAssociationEmail(),
                'phone' => $informationsService->getAssociationPhone(),
            ],
            'to' => [
                'name' => $contact->getSenderName(),
                'email' => $contact->getSenderEmail(),
            ],
            'subject' => "Re: {$contact->getSubject()}",
            'message' => $request->request->get('answer'),
        ], 'reply');

        $newContact = (new Contact())
            ->setSenderType('reply')
            ->setSenderEmail($informationsService->getAssociationEmail())
            ->setSenderName($informationsService->getAssociationName())
            ->setSenderPhone($informationsService->getAssociationPhone())
            ->setSubject("Re: {$contact->getSubject()}")
            ->setMessage($request->request->get('answer'))
            ->setSentAt(new \DateTimeImmutable());
        $entityManager->persist($newContact);

        $contact->addReply($newContact)
            ->setAnsweredAt(new \DateTimeImmutable());
        $entityManager->persist($contact);

        $entityManager->flush();

        $this->addFlash('success', "Votre réponse a été envoyée à {$contact->getSenderName()}");

        return $this->redirectToRoute('admin_contact_messages_index', [], Response::HTTP_SEE_OTHER);
    }
}

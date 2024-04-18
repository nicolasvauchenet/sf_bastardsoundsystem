<?php

namespace App\FrontOfficeBundle\Controller;

use App\AppBundle\Service\MailerService;
use App\FrontOfficeBundle\Entity\Contact;
use App\FrontOfficeBundle\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_')]
class ContactController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('contactons-nous', name: 'contact')]
    public function index(Request                $request,
                          MailerService          $mailerService,
                          EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        if($this->getUser()) {
            if($this->isGranted('ROLE_ADHERENT')) {
                $contact->setSenderType($this->getUser()->getAdherentType());
            } else if($this->isGranted('ROLE_PARTENAIRE')) {
                $contact->setSenderType($this->getUser()->getPartenaireType());
            }
            $contact->setSenderName($this->getUser()->getFullName())
                ->setSenderEmail($this->getUser()->getUserIdentifier())
                ->setSenderPhone($this->getUser()->getPhone());
        }

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $mailerService->sendEmail([
                'from' => [
                    'type' => $form->get('senderType')->getData(),
                    'name' => $form->get('senderName')->getData(),
                    'email' => $form->get('senderEmail')->getData(),
                    'phone' => $form->get('senderPhone')->getData(),
                ],
                'to' => [
                    'name' => 'Administrateur BSS',
                    'email' => 'admin@bastardsoundsystem.org',
                ],
                'subject' => $form->get('subject')->getData(),
                'message' => $form->get('message')->getData(),
            ]);

            $contact->setSentAt(new \DateTimeImmutable());
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', 'Votre message a été envoyé ! On vous répond très vite');

            return $this->redirectToRoute('front_office_contact', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@FrontOffice/contact/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

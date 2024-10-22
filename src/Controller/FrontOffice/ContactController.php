<?php

namespace App\Controller\FrontOffice;

use App\Form\MessageType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/contacter-bss', name: 'app_front_office_contact')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          MailerService          $mailerService): Response
    {
        $message = new Message();
        if($user = $this->getUser()) {
            $message->setSenderName($user->getName())
                ->setSenderEmail($user->getEmail());

            if($this->isGranted('ROLE_ARTIST')) {
                if($user->getBandmates() === 1) {
                    $message->setSenderType('Musicien');
                } else {
                    $message->setSenderType('Groupe');
                }
            } else if($this->isGranted('ROLE_PARTNER')) {
                $message->setSenderType($user->getType());
            } else if($this->isGranted('ROLE_MEMBER')) {
                $message->setSenderType('Adhérent');
            } else if($this->isGranted('ROLE_ADMIN')) {
                $message->setSenderType('Organisation');
            }

            if(!$this->isGranted('ROLE_ADMIN')) {
                $message->setSenderPhone($user->getPhone());
            }
        }

        $form = $this->createForm(MessageType::class, $message);
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
                    'name' => 'Bastard Sound System',
                    'email' => 'contact@bastardsoundsystem.org',
                ],
                'subject' => $form->get('subject')->getData(),
                'message' => $form->get('message')->getData(),
            ], 'front_office/contact/_email');

            $message->setStatus('Nouveau');
            $entityManager->persist($message);
            $entityManager->flush();

            $this->addFlash('success', 'Ton message a bien été envoyé, merci :) On va te répondre très vite&nbsp;!');

            return $this->redirectToRoute('app_front_office_contact', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_office/contact/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

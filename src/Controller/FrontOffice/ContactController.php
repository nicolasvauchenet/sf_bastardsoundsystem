<?php

namespace App\Controller\FrontOffice;

use App\Entity\FrontOffice\Contact;
use App\Form\FrontOffice\ContactType;
use App\Service\MailerService;
use App\Service\ParametersService;
use App\Twig\Filters\PhoneFilter;
use Doctrine\ORM\EntityManagerInterface;
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
    #[Route('/contactons-nous', name: 'app_front_office_contact')]
    public function index(Request                $request,
                          MailerService          $mailerService,
                          ParametersService      $parametersService,
                          EntityManagerInterface $entityManager,
                          PhoneFilter            $phoneFilter): Response
    {
        $contact = new Contact();
        if($user = $this->getUser()) {
            if($this->isGranted('ROLE_MEMBER')) {
                $contact->setSenderType($user->getMemberType())
                    ->setSenderPhone($phoneFilter->formatPhone($user->getPhone()));
            } else if($this->isGranted('ROLE_PARTNER')) {
                $contact->setSenderType($user->getPartnerType())
                    ->setSenderPhone($phoneFilter->formatPhone($user->getPhone()));
            }
            $contact->setSenderName($user->getFullname())
                ->setSenderEmail($user->getUserIdentifier());
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
                    'name' => $parametersService->getAppName(),
                    'email' => $parametersService->getAppEmail(),
                ],
                'subject' => $form->get('subject')->getData(),
                'message' => $form->get('message')->getData(),
            ], 'front_office/contact/_email');

            $contact->setSentAt(new \DateTimeImmutable());
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', 'Votre message a été envoyé ! On vous répond très vite');

            return $this->redirectToRoute('app_front_office_contact', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_office/contact/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

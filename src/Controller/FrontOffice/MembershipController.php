<?php

namespace App\Controller\FrontOffice;

use App\Entity\Membership;
use App\Form\MembershipType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

class MembershipController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/adherer-a-bss', name: 'app_front_office_membership')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          MailerService          $mailerService): Response
    {
        $membership = new Membership();
        $form = $this->createForm(MembershipType::class, $membership);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $mailerService->sendEmail([
                'from' => [
                    'type' => $form->get('memberType')->getData(),
                    'name' => $form->get('name')->getData(),
                    'email' => $form->get('email')->getData(),
                    'phone' => $form->get('phone')->getData(),
                    'city' => $form->get('city')->getData(),
                ],
                'to' => [
                    'name' => 'Bastard Sound System',
                    'email' => 'contact@bastardsoundsystem.org',
                ],
                'subject' => "Nouvelle demande d'adhésion",
                'message' => $form->get('message')->getData(),
            ], 'front_office/membership/_email');

            $membership->setStatus('Nouvelle');
            $entityManager->persist($membership);
            $entityManager->flush();

            $this->addFlash('success', "Ta demande d'adhésion a bien été envoyée, merci :) On va te contacter très vite&nbsp;!");

            return $this->redirectToRoute('app_front_office_membership', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_office/membership/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

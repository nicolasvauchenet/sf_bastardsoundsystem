<?php

namespace App\Controller\FrontOffice;

use App\Entity\Partnership;
use App\Form\PartnershipType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

class PartnershipController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/devenir-partenaire', name: 'app_front_office_partnership')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          MailerService          $mailerService): Response
    {
        $partnership = new Partnership();
        $form = $this->createForm(PartnershipType::class, $partnership);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $partnership->setStatus('Nouvelle');
            $entityManager->persist($partnership);
            $entityManager->flush();

            $mailerService->sendEmail([
                'from' => [
                    'type' => $form->get('partnerType')->getData(),
                    'name' => $form->get('name')->getData(),
                    'email' => $form->get('email')->getData(),
                    'phone' => $form->get('phone')->getData(),
                    'city' => $form->get('city')->getData(),
                ],
                'to' => [
                    'name' => 'Bastard Sound System',
                    'email' => 'contact@bastardsoundsystem.org',
                ],
                'subject' => 'Nouvelle proposition de partenariat',
                'message' => $form->get('message')->getData(),
            ], 'front_office/partnership/_email');

            $this->addFlash('success', 'Ta proposition de partenariat a bien été envoyée, merci :) On va te contacter très vite&nbsp;!');

            return $this->redirectToRoute('app_front_office_partnership', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_office/partnership/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

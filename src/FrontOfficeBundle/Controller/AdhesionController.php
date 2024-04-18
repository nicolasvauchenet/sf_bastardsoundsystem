<?php

namespace App\FrontOfficeBundle\Controller;

use App\AppBundle\Entity\User;
use App\AppBundle\Service\MailerService;
use App\FrontOfficeBundle\Entity\Adhesion;
use App\FrontOfficeBundle\Entity\Partenariat;
use App\FrontOfficeBundle\Form\AdhesionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_')]
class AdhesionController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('devenir-adherent', name: 'adhesion')]
    public function index(Request                $request,
                          MailerService          $mailerService,
                          EntityManagerInterface $entityManager): Response
    {
        $adhesion = new Adhesion();
        $form = $this->createForm(AdhesionType::class, $adhesion);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $userExists = $entityManager->getRepository(User::class)->findOneBy(['email' => $form->get('adherentEmail')->getData()]);
            $partenaireExists = $entityManager->getRepository(Partenariat::class)->findOneBy(['partenaireEmail' => $form->get('adherentEmail')->getData(), 'rejectedAt' => null]);
            $adherentExists = $entityManager->getRepository(Adhesion::class)->findOneBy(['adherentEmail' => $form->get('adherentEmail')->getData(), 'rejectedAt' => null]);

            if($userExists || $partenaireExists || $adherentExists) {
                $this->addFlash('danger', "Nous avons déjà quelqu'un avec cette adresse e-mail. Veuillez en choisir une autre.");

                return $this->render('@FrontOffice/adhesion/index.html.twig', [
                    'form' => $form->createView(),
                ], new Response(null, 422));
            }

            $mailerService->sendEmail([
                'from' => [
                    'type' => $form->get('adherentType')->getData(),
                    'name' => $form->get('adherentName')->getData(),
                    'email' => $form->get('adherentEmail')->getData(),
                    'phone' => $form->get('adherentPhone')->getData(),
                ],
                'to' => [
                    'name' => 'Administrateur BSS',
                    'email' => 'admin@bastardsoundsystem.org',
                ],
                'subject' => "Nouvelle demande d'adhésion",
                'message' => $form->get('adherentMessage')->getData(),
            ], 'adhesion');

            $adhesion->setSentAt(new \DateTimeImmutable());
            $entityManager->persist($adhesion);
            $entityManager->flush();

            $this->addFlash('success', "Votre demande d'adhésion a été envoyée ! On étudie ça et on prend contact avec vous tout bientôt");

            return $this->redirectToRoute('front_office_adhesion', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@FrontOffice/adhesion/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

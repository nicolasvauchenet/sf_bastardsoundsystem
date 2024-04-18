<?php

namespace App\FrontOfficeBundle\Controller;

use App\AppBundle\Entity\User;
use App\AppBundle\Service\MailerService;
use App\FrontOfficeBundle\Entity\Adhesion;
use App\FrontOfficeBundle\Entity\Partenariat;
use App\FrontOfficeBundle\Form\PartenariatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_')]
class PartenariatController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('devenir-partenaire', name: 'partenariat')]
    public function index(Request                $request,
                          MailerService          $mailerService,
                          EntityManagerInterface $entityManager): Response
    {
        $partenariat = new Partenariat();
        $form = $this->createForm(PartenariatType::class, $partenariat);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $userExists = $entityManager->getRepository(User::class)->findOneBy(['email' => $form->get('partenaireEmail')->getData()]);
            $partenaireExists = $entityManager->getRepository(Partenariat::class)->findOneBy(['partenaireEmail' => $form->get('partenaireEmail')->getData()]);
            $adherentExists = $entityManager->getRepository(Adhesion::class)->findOneBy(['adherentEmail' => $form->get('partenaireEmail')->getData()]);

            if($userExists || $partenaireExists || $adherentExists) {
                $this->addFlash('danger', "Nous avons déjà quelqu'un avec cette adresse e-mail. Veuillez en choisir une autre.");

                return $this->render('@FrontOffice/partenariat/index.html.twig', [
                    'form' => $form->createView(),
                ], new Response(null, 422));
            }

            $mailerService->sendEmail([
                'from' => [
                    'type' => $form->get('partenaireType')->getData(),
                    'name' => $form->get('partenaireName')->getData(),
                    'email' => $form->get('partenaireEmail')->getData(),
                    'phone' => $form->get('partenairePhone')->getData(),
                ],
                'to' => [
                    'name' => 'Administrateur BSS',
                    'email' => 'admin@bastardsoundsystem.org',
                ],
                'subject' => 'Nouvelle demande de partenariat',
                'message' => $form->get('partenaireMessage')->getData(),
            ], 'partenariat');

            $partenariat->setSentAt(new \DateTimeImmutable());
            $entityManager->persist($partenariat);
            $entityManager->flush();

            $this->addFlash('success', 'Votre demande de partenariat a été envoyée ! On étudie ça et on prend contact avec vous tout bientôt');

            return $this->redirectToRoute('front_office_partenariat', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@FrontOffice/partenariat/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

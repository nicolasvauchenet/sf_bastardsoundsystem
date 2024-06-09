<?php

namespace App\Controller\FrontOffice;

use App\Entity\Partner\Partnership;
use App\Form\Partner\PartnershipType;
use App\Service\BackOffice\Administration\ParametersService;
use App\Service\FileUploaderService;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class PartnershipController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/devenez-partenaire', name: 'app_front_office_partnership')]
    public function index(Request                $request,
                          FileUploaderService    $fileUploaderService,
                          SluggerInterface       $slugger,
                          MailerService          $mailerService,
                          ParametersService      $parametersService,
                          EntityManagerInterface $entityManager): Response
    {
        $partnership = new Partnership();
        $form = $this->createForm(PartnershipType::class, $partnership);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $logoFile */
            $logoFile = $form->get('logo')->getData();
            if($logoFile) {
                $logoFileName = $fileUploaderService->upload($logoFile, 'partner', strtolower($slugger->slug($partnership->getPartnerName())));
                $partnership->setLogo($logoFileName);
            }

            $mailerService->sendEmail([
                'from' => [
                    'type' => $form->get('partnerType')->getData(),
                    'name' => $form->get('partnerName')->getData(),
                    'email' => $form->get('partnerEmail')->getData(),
                    'phone' => $form->get('partnerPhone')->getData(),
                ],
                'to' => [
                    'name' => $parametersService->getAppName(),
                    'email' => $parametersService->getAppEmail(),
                ],
                'subject' => 'Nouvelle demande de partenariat',
                'message' => $form->get('message')->getData(),
            ], 'front_office/partnership/_email');

            $partnership->setSentAt(new \DateTimeImmutable());
            $entityManager->persist($partnership);
            $entityManager->flush();

            $this->addFlash('success', "Votre demande de partenariat est envoyée ! On regarde ça et on prend contact avec vous tout bientôt");

            return $this->redirectToRoute('app_front_office_partnership', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_office/partnership/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

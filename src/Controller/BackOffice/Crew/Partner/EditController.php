<?php

namespace App\Controller\BackOffice\Crew\Partner;

use App\Entity\Partner\Partner;
use App\Form\BackOffice\Crew\Partner\PartnerType;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class EditController extends AbstractController
{
    #[Route('/administration/partenaires/modifier/{id}', name: 'app_back_office_crew_partner_edit')]
    public function edit(Request                     $request,
                         EntityManagerInterface      $entityManager,
                         FileUploaderService         $fileUploaderService,
                         SluggerInterface            $slugger,
                         UserPasswordHasherInterface $passwordHasher,
                         Partner                     $partner): Response
    {
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $logoFile */
            $logoFile = $form->get('logo')->getData();
            if($logoFile) {
                if($partner->getLogo()) {
                    $fileUploaderService->remove('partner', $partner->getLogo());
                }
                $logoFileName = $fileUploaderService->upload($logoFile, 'partner', strtolower($slugger->slug($partner->getFullname())));
                $partner->setLogo($logoFileName);
            }

            if($form->get('plainPassword')->getData()) {
                $partner->setPassword($passwordHasher->hashPassword($partner, $form->get('plainPassword')->getData()));
            }

            $entityManager->persist($partner);
            $entityManager->flush();

            $this->addFlash('success', "Le partenaire {$partner->getFullname()} a été modifié !");

            return $this->redirectToRoute('app_back_office_crew_partner_view', ['id' => $partner->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/crew/partner/edit/index.html.twig', [
            'form' => $form->createView(),
            'partner' => $partner,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

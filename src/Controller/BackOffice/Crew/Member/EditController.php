<?php

namespace App\Controller\BackOffice\Crew\Member;

use App\Entity\Member\Member;
use App\Form\BackOffice\Crew\Member\MemberType;
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
    #[Route('/administration/membres/modifier/{id}', name: 'app_back_office_crew_member_edit')]
    public function edit(Request                     $request,
                         EntityManagerInterface      $entityManager,
                         FileUploaderService         $fileUploaderService,
                         SluggerInterface            $slugger,
                         UserPasswordHasherInterface $passwordHasher,
                         Member                      $member): Response
    {
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $logoFile */
            $logoFile = $form->get('logo')->getData();
            if($logoFile) {
                if($member->getLogo()) {
                    $fileUploaderService->remove('member', $member->getLogo());
                }
                $logoFileName = $fileUploaderService->upload($logoFile, 'member', strtolower($slugger->slug($member->getFullname())));
                $member->setLogo($logoFileName);
            }

            if($form->get('plainPassword')->getData()) {
                $member->setPassword($passwordHasher->hashPassword($member, $form->get('plainPassword')->getData()));
            }

            $entityManager->persist($member);
            $entityManager->flush();

            $this->addFlash('success', "L'adhérent {$member->getFullname()} a été modifié !");

            return $this->redirectToRoute('app_back_office_crew_member_view', ['id' => $member->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/crew/member/edit/index.html.twig', [
            'form' => $form->createView(),
            'member' => $member,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

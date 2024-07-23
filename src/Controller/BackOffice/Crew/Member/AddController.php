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

class AddController extends AbstractController
{
    #[Route('/administration/adherents/ajouter', name: 'app_back_office_crew_member_add')]
    public function add(Request                     $request,
                        EntityManagerInterface      $entityManager,
                        FileUploaderService         $fileUploaderService,
                        SluggerInterface            $slugger,
                        UserPasswordHasherInterface $passwordHasher): Response
    {
        $member = (new Member())
            ->setActive(true);
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $logoFile */
            $logoFile = $form->get('logo')->getData();
            if($logoFile) {
                $logoFileName = $fileUploaderService->upload($logoFile, 'member', strtolower($slugger->slug($member->getFullname())));
                $member->setLogo($logoFileName);
            }

            if($form->get('plainPassword')->getData()) {
                $member->setPassword($passwordHasher->hashPassword($member, $form->get('plainPassword')->getData()));
            }

            $member->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($member);
            $entityManager->flush();

            $this->addFlash('success', "L'Adhérent {$member->getFullname()} a été créé !");

            return $this->redirectToRoute('app_back_office_crew_member_view', ['id' => $member->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/crew/member/add/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

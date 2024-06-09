<?php

namespace App\Controller;

use App\Entity\Member\Member;
use App\Entity\Partner\Partner;
use App\Entity\User;
use App\Form\ProfileType as AdminProfileType;
use App\Form\Member\ProfileType as MemberProfileType;
use App\Form\Partner\ProfileType as PartnerProfileType;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProfileController extends AbstractController
{
    #[Route('/mon-compte', name: 'app_profile')]
    public function index(Request                     $request,
                          FileUploaderService         $fileUploaderService,
                          SluggerInterface            $slugger,
                          UserPasswordHasherInterface $passwordHasher,
                          EntityManagerInterface      $entityManager): Response
    {
        $user = $this->getUser();
        if($this->isGranted('ROLE_ADMIN')) {
            $form = $this->createForm(AdminProfileType::class, $user);
        } else if($this->isGranted('ROLE_MEMBER')) {
            $form = $this->createForm(MemberProfileType::class, $user);
        } else if($this->isGranted('ROLE_PARTNER')) {
            $form = $this->createForm(PartnerProfileType::class, $user);
        }
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(User::class !== get_class($user)) {
                /** @var UploadedFile $logoFile */
                $logoFile = $form->get('logo')->getData();
                if($logoFile) {
                    if(Member::class === get_class($user)) {
                        if($user->getLogo()) {
                            $fileUploaderService->remove('member', $user->getLogo());
                        }
                        $logoFileName = $fileUploaderService->upload($logoFile, 'member', strtolower($slugger->slug($user->getFullname())));
                    } else if(Partner::class === get_class($user)) {
                        if($user->getLogo()) {
                            $fileUploaderService->remove('partner', $user->getLogo());
                        }
                        $logoFileName = $fileUploaderService->upload($logoFile, 'partner', strtolower($slugger->slug($user->getFullname())));
                    }
                    $user->setLogo($logoFileName);
                }
            }

            if($form->get('plainPassword')->getData()) {
                $user->setPassword($passwordHasher->hashPassword($user, $form->get('plainPassword')->getData()));
            }
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre compte a été modifié !');

            return $this->redirectToRoute('app_profile', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profile/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }

    #[Route('/mon-compte/logo/supprimer', name: 'app_profile_logo_delete')]
    public function imageDelete(FileUploaderService    $fileUploaderService,
                                EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if($user->getLogo()) {
            if(Member::class === get_class($user)) {
                $fileUploaderService->remove('member', $user->getLogo());
            } else if(Partner::class === get_class($user)) {
                $fileUploaderService->remove('partner', $user->getLogo());
            }
            $user->setLogo(null);
        }

        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('danger', 'Votre logo a été supprimé !');

        return $this->redirectToRoute('app_profile');
    }
}

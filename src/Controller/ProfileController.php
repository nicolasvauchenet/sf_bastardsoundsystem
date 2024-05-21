<?php

namespace App\Controller;

use App\Form\ProfileType as AdminProfileType;
use App\Form\Member\ProfileType as MemberProfileType;
use App\Form\Partner\ProfileType as PartnerProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/mon-compte', name: 'app_profile')]
    public function index(Request                     $request,
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
}

<?php

namespace App\AdminBundle\Controller\Adherent;

use App\AdherentBundle\Entity\Adherent;
use App\AdminBundle\Form\Adherent\AdherentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adherents', name: 'admin_adherents_')]
class EditController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request                     $request,
                         EntityManagerInterface      $entityManager,
                         UserPasswordHasherInterface $passwordHasher,
                         Adherent                    $adherent): Response
    {
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($form->get('plainPassword')->getData()) {
                $adherent->setPassword($passwordHasher->hashPassword($adherent, $form->get('plainPassword')->getData()));
            }

            $entityManager->persist($adherent);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez modifié l'adhérent {$adherent->getName()}");

            return $this->redirectToRoute('admin_adherents_view', ['id' => $adherent->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/adherent/edit.html.twig', [
            'form' => $form->createView(),
            'adherent' => $adherent,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

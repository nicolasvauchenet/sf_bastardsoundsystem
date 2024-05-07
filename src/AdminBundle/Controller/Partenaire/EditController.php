<?php

namespace App\AdminBundle\Controller\Partenaire;

use App\PartenaireBundle\Entity\Partenaire;
use App\AdminBundle\Form\Partenaire\PartenaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/partenaires', name: 'admin_partenaires_')]
class EditController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request                     $request,
                         EntityManagerInterface      $entityManager,
                         UserPasswordHasherInterface $passwordHasher,
                         Partenaire                  $partenaire): Response
    {
        $form = $this->createForm(PartenaireType::class, $partenaire);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($form->get('plainPassword')->getData()) {
                $partenaire->setPassword($passwordHasher->hashPassword($partenaire, $form->get('plainPassword')->getData()));
            }

            $entityManager->persist($partenaire);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez modifié le partenaire {$partenaire->getName()}");

            return $this->redirectToRoute('admin_partenaires_view', ['id' => $partenaire->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/partenaire/edit.html.twig', [
            'form' => $form->createView(),
            'partenaire' => $partenaire,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

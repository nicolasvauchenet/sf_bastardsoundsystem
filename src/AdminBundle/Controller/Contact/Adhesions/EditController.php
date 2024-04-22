<?php

namespace App\AdminBundle\Controller\Contact\Adhesions;

use App\AdminBundle\Form\Contact\AdhesionType;
use App\FrontOfficeBundle\Entity\Adhesion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/adhesions', name: 'admin_contact_adhesions_')]
class EditController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager,
                         Adhesion               $adhesion): Response
    {
        $form = $this->createForm(AdhesionType::class, $adhesion);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adhesion);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez modifié la demande d'adhésion de {$adhesion->getAdherentName()}");

            return $this->redirectToRoute('admin_contact_adhesions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/contact/adhesions/edit.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

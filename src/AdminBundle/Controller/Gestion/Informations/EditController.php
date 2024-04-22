<?php

namespace App\AdminBundle\Controller\Gestion\Informations;

use App\AdminBundle\Form\Gestion\InformationsType;
use App\AppBundle\Entity\Informations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/informations', name: 'admin_gestion_informations_')]
class EditController extends AbstractController
{
    #[Route('/modifier', name: 'edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager): Response
    {
        $informations = $entityManager->getRepository(Informations::class)->find(1);

        $form = $this->createForm(InformationsType::class, $informations);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($informations);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez modifié les informations de {$informations->getName()}");

            return $this->redirectToRoute('admin_gestion_informations_edit', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/gestion/informations/edit.html.twig', [
            'form' => $form->createView(),
            'informations' => $informations,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

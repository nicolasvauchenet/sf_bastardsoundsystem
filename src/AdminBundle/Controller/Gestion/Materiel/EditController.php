<?php

namespace App\AdminBundle\Controller\Gestion\Materiel;

use App\AdminBundle\Form\Gestion\MaterielType;
use App\AppBundle\Service\FileUploaderService;
use App\MaterielBundle\Entity\Materiel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/materiel', name: 'admin_gestion_materiel_')]
class EditController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager,
                         FileUploaderService    $fileUploaderService,
                         Materiel               $materiel): Response
    {
        $form = $this->createForm(MaterielType::class, $materiel);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($form->get('invoice')->getData()) {
                if($materiel->getInvoice()) {
                    $fileUploaderService->remove($materiel->getInvoice(), 'materiel');
                }
                $invoice = $form->get('invoice')->getData();
                $filename = $fileUploaderService->upload($invoice, null, 'materiel');
                $materiel->setInvoice($filename);
            }
            $materiel->setUpdatedAt(new \DateTimeImmutable());

            $entityManager->persist($materiel);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez modifié le matériel {$materiel->getName()}");

            return $this->redirectToRoute('admin_gestion_materiel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/gestion/materiel/edit.html.twig', [
            'form' => $form->createView(),
            'materiel' => $materiel,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

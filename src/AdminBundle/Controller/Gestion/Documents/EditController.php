<?php

namespace App\AdminBundle\Controller\Gestion\Documents;

use App\AdminBundle\Entity\Document\Document;
use App\AdminBundle\Form\Gestion\DocumentType;
use App\AppBundle\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/documents', name: 'admin_gestion_documents_')]
class EditController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager,
                         FileUploaderService    $fileUploaderService,
                         Document               $document): Response
    {
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($form->get('filename')->getData()) {
                if($document->getFilename()) {
                    $fileUploaderService->remove($document->getFilename(), 'documents');
                }
                $documentFile = $form->get('filename')->getData();
                $filename = $fileUploaderService->upload($documentFile, null, 'documents');
                $document->setFilename($filename);
            }
            $document->setUpdatedAt(new \DateTimeImmutable());

            $entityManager->persist($document);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez modifié le document {$document->getName()}");

            return $this->redirectToRoute('admin_gestion_documents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/gestion/documents/edit.html.twig', [
            'form' => $form->createView(),
            'document' => $document,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

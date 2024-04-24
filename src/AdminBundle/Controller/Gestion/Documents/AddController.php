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
class AddController extends AbstractController
{
    #[Route('/nouveau', name: 'add')]
    public function add(Request                $request,
                        EntityManagerInterface $entityManager,
                        FileUploaderService    $fileUploaderService): Response
    {
        $document = (new Document())
            ->setStatus('Hors ligne')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($form->get('filename')->getData()) {
                $documentFile = $form->get('filename')->getData();
                $filename = $fileUploaderService->upload($documentFile, null, 'documents');
                $document->setFilename($filename);
            }

            $entityManager->persist($document);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez ajouté le document {$document->getName()}");

            return $this->redirectToRoute('admin_gestion_documents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/gestion/documents/add.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

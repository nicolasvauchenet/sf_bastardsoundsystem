<?php

namespace App\Controller\BackOffice\Administration\Document;

use App\Entity\Document\Document;
use App\Form\BackOffice\Administration\Document\DocumentType;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class EditController extends AbstractController
{
    #[Route('/administration/documents/modifier/{slug}', name: 'app_back_office_administration_document_edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager,
                         FileUploaderService    $fileUploaderService,
                         SluggerInterface       $slugger,
                         Document               $document): Response
    {
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $documentFile */
            $documentFile = $form->get('filename')->getData();
            if($documentFile) {
                $fileUploaderService->remove('documents', $document->getFilename());
                $documentFileName = $fileUploaderService->upload($documentFile, 'documents', strtolower($slugger->slug($document->getName())));
                $document->setFilename($documentFileName);
            }

            $entityManager->persist($document);
            $entityManager->flush();

            $this->addFlash('success', "Le document {$document->getName()} a été modifié !");

            return $this->redirectToRoute('app_back_office_administration_document_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/administration/document/edit/index.html.twig', [
            'form' => $form->createView(),
            'document' => $document,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

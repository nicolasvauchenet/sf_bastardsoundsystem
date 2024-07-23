<?php

namespace App\Controller\BackOffice\Administration\Document;

use App\Entity\Document\Category;
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

class AddController extends AbstractController
{
    #[Route('/administration/documents/ajouter/{slug}', name: 'app_back_office_administration_document_add')]
    public function add(Request                $request,
                        EntityManagerInterface $entityManager,
                        FileUploaderService    $fileUploaderService,
                        SluggerInterface       $slugger,
                        Category               $category): Response
    {
        $document = (new Document())
            ->setCategory($category)
            ->setActive(true);
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $documentFile */
            $documentFile = $form->get('filename')->getData();
            if($documentFile) {
                $documentFileName = $fileUploaderService->upload($documentFile, 'documents', strtolower($slugger->slug($document->getName())));
                $document->setFilename($documentFileName);
            }

            $entityManager->persist($document);
            $entityManager->flush();

            $this->addFlash('success', "Le document {$document->getName()} a été créé !");

            return $this->redirectToRoute('app_back_office_administration_document_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/administration/document/add/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}

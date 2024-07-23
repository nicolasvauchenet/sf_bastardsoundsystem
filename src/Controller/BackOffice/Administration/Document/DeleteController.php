<?php

namespace App\Controller\BackOffice\Administration\Document;

use App\Entity\Document\Document;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeleteController extends AbstractController
{
    #[Route('/administration/documents/supprimer/{id}', name: 'app_back_office_administration_document_delete')]
    public function delete(FileUploaderService    $fileUploaderService,
                           EntityManagerInterface $entityManager,
                           Document               $document): Response
    {
        $fileUploaderService->remove('document', $document->getFilename());

        $entityManager->remove($document);
        $entityManager->flush();

        $this->addFlash('danger', "Le document {$document->getName()} a été supprimé !");

        return $this->redirectToRoute('app_back_office_administration_document_home');
    }
}

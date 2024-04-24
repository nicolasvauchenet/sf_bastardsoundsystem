<?php

namespace App\AdminBundle\Controller\Gestion\Documents;

use App\AppBundle\Service\FileUploaderService;
use App\DocumentBundle\Entity\Document;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/documents', name: 'admin_gestion_documents_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager,
                           FileUploaderService    $fileUploaderService,
                           Document               $document): Response
    {
        if($document->getFilename()) {
            $fileUploaderService->remove($document->getFilename(), 'documents');
        }

        $entityManager->remove($document);
        $entityManager->flush();

        $this->addFlash('danger', "Vous avez supprimé le document {$document->getName()}");

        return $this->redirectToRoute('admin_gestion_documents_index', [], Response::HTTP_SEE_OTHER);
    }
}

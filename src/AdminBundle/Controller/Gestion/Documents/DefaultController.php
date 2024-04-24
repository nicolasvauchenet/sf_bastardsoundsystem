<?php

namespace App\AdminBundle\Controller\Gestion\Documents;

use App\AdminBundle\Entity\Document\Category;
use App\AdminBundle\Entity\Document\Document;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/documents', name: 'admin_gestion_documents_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('@Admin/gestion/documents/index.html.twig', [
            'officiels' => $entityManager->getRepository(Document::class)->findOfficials(),
            'categories' => $entityManager->getRepository(Category::class)->findNonOfficials(),
        ]);
    }
}

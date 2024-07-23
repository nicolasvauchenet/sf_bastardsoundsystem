<?php

namespace App\Controller\FrontOffice;

use App\Repository\Document\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DocumentsController extends AbstractController
{
    #[Route('/documents-legaux', name: 'app_front_office_documents')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('front_office/documents/default/index.html.twig', [
            'categories' => $categoryRepository->findBy([], ['position' => 'ASC']),
        ]);
    }
}

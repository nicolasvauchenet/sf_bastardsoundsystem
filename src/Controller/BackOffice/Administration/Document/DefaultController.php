<?php

namespace App\Controller\BackOffice\Administration\Document;

use App\Repository\Document\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/administration/documents', name: 'app_back_office_administration_document_home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('back_office/administration/document/default/index.html.twig', [
            'categories' => $categoryRepository->findBy([], ['position' => 'ASC']),
        ]);
    }
}

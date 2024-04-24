<?php

namespace App\AdminBundle\Controller\Gestion\Documents;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/documents', name: 'admin_gestion_documents_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(): Response
    {
        return $this->render('@Admin/gestion/documents/index.html.twig');
    }
}

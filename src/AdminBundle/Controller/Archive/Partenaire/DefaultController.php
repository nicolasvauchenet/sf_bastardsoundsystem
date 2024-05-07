<?php

namespace App\AdminBundle\Controller\Archive\Partenaire;

use App\AdminBundle\Service\Statistics\PartenaireService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/archives/partenaires', name: 'admin_archives_partenaires_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(PartenaireService $partenaireService): Response
    {
        return $this->render('@Admin/archive/partenaire/index.html.twig', [
            'partenaires' => $partenaireService->getArchivedPartenaires(),
        ]);
    }
}

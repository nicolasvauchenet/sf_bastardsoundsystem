<?php

namespace App\AdminBundle\Controller\Archive\Adherent;

use App\AdminBundle\Service\Statistics\AdherentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/archives/adherents', name: 'admin_archives_adherents_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(AdherentService $adherentService): Response
    {
        return $this->render('@Admin/archives/adherent/index.html.twig', [
            'adherents' => $adherentService->getArchivedAdherents(),
        ]);
    }
}

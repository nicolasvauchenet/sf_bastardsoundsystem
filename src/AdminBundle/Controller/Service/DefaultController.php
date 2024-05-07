<?php

namespace App\AdminBundle\Controller\Service;

use App\ServiceBundle\Service\ServicesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/services', name: 'admin_services_')]
class DefaultController extends AbstractController
{
    #[Route('/adherent', name: 'adherent')]
    public function adherent(ServicesService $servicesService): Response
    {
        return $this->render('@Admin/service/index.html.twig', [
            'categories' => $servicesService->getFirstCategories('adherent'),
            'type' => 'Adhérent',
        ]);
    }

    #[Route('/partenaire', name: 'partenaire')]
    public function partenaire(ServicesService $servicesService): Response
    {
        return $this->render('@Admin/service/index.html.twig', [
            'categories' => $servicesService->getFirstCategories('partenaire'),
            'type' => 'Partenaire',
        ]);
    }
}
